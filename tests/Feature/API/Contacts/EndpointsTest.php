<?php

declare(strict_types=1);

use Domains\Contacts\Enums\Pronouns;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use JustSteveKing\StatusCode\Http;

use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

//
it('receives a 401 on index when not logged in', function () {
    getJson(
        uri: route('api:contacts:index'),
    )->assertStatus(
        status:Http::UNAUTHORIZED,
    );
}); //2

it('it can retrieve  a list of contacts of users', function () {
    //auth()->loginUsingId(User::factory()->create()->id);
    auth()->login(User::factory()->create());

    Contact::factory(10)->create();

    getJson(
        uri: route('api:contacts:index'),
    )->assertStatus(
       status:Http::OK
   )->assertJson(
       fn (AssertableJson $json) =>
          $json->count(10)->first(
              fn (AssertableJson $json) =>
              $json->where(key: 'type', expected: 'contact')->etc(),
          ),
   );
}); //2

it('receives a 401 on create when not logged in', function (string $string) {
    postJson(
        uri: route('api:contacts:store'),
        data: [
                 'title' => $string,
                 'name' => [
                     'first'         => $string,
                     'middle'        => $string,
                     'last'          => $string,
                     'preferred'     => $string,
                     'full'          => "$string $string $string",
                 ],
                 'phone'    =>$string,
                 'email'    =>"{$string}@gmail.com",
                 'pronouns' => Pronouns::random(),
                 //'pronouns' => $string,
             ]
    )->assertStatus(
        status: Http::UNAUTHORIZED
    );
})->with('strings');//4

it('can create a new contact', function (string $string) {
    auth()->login(User::factory()->create());
    //expect(Contact::query()->count())->toEqual(0); //when I start the test, there are no contacts   0
    expect(EloquentStoredEvent::query()->count())->toEqual(0);

    //Send a request to create a new contact
    postJson(
        uri: route('api:contacts:store'),
        data: [
                'title' => $string,
                'name' => [
                    'first'         => $string,
                    'middle'        => $string,
                    'last'          => $string,
                    'preferred'     => $string,
                    'full'          => "$string $string $string",
                ],
                 'phone'    =>$string,
                 'email'    =>"{$string}@gmail.com",
                 'pronouns' => Pronouns::random(),
                 //'pronouns' => $string,
             ]
    )->assertStatus(
        status: Http::ACCEPTED
    );

    //Check that the contact was created in database
    //expect(Contact::query()->count())->toEqual(1);
    expect(EloquentStoredEvent::query()->count())->toEqual(1);
})->with('strings');//3

it('can retrieve a contact by UUID', function () {
    auth()->login(User::factory()->create());

    $contact = Contact::factory()->create();

    getJson(
        uri: route('api:contacts:show', $contact->uuid),
    )->assertStatus(
       status: Http::OK
   )->assertJson(
       fn (AssertableJson $json) =>
    $json
        ->where(key: 'type', expected: 'contact')
        ->where(key: 'attributes.name.first', expected: $contact->first_name)
        ->where(key: 'attributes.name.last', expected: $contact->last_name)
        ->where(key: 'attributes.phone', expected: $contact->phone)
        ->etc(),
   );
});//5

it('receives a 401 on show when not logged in', function () {
    $contact = Contact::factory()->create();

    getJson(
        uri: route('api:contacts:show', $contact->uuid),
    )->assertStatus(
        status: Http::UNAUTHORIZED
    );
});//6

it('receives a 404 on show with incorrect UUID', function (string $string) {
    auth()->login(User::factory()->create());
    getJson(
        uri: route('api:contacts:show', $string),
    )->assertStatus(
        status: Http::NOT_FOUND
    );
})->with('strings');//7

it('can update the contact record', function (string $string) {
    auth()->login(User::factory()->create());

    $contact = Contact::factory()->create();

    expect(EloquentStoredEvent::query()->count())->toEqual(0);

    expect(
        putJson(
            uri: route('api:contacts:update', $contact->uuid),
            data: [
                     'title' => $string,
                     'name' => [
                         'first'         => $string,
                         'middle'        => $string,
                         'last'          => $string,
                         'preferred'     => $string,
                         'full'          => "$string $string $string",
                     ],
                     'phone'    =>$string,
                     'email'    =>"{$string}@gmail.com",
                     'pronouns' => Pronouns::random(),
                     //'pronouns' => $string,
                 ]
        )
    )->assertStatus(
            status: Http::ACCEPTED
        );

    /**expect(
        $contact->refresh()
    )->first_name->toEqual($string);*/
    expect(EloquentStoredEvent::query()->count())->toEqual(1);
})->with('strings');//8
it('returns a not found status code when trying to update a contact that doesnt exist', function (string $uuid) {
    auth()->login(User::factory()->create());
    expect(
        putJson(
            uri: route('api:contacts:update', $uuid),
            data: [
                     'title' => "Doctor",
                     'name' => [
                         'first'         => $uuid,
                         'middle'        => $uuid,
                         'last'          => $uuid,
                         'preferred'     => $uuid,
                         'full'          => "$uuid",
                     ],
                     'phone'    =>$uuid,
                     'email'    =>"{$uuid}@gmail.com",
                     'pronouns' => Pronouns::random(),

                 ]
        )
    )->assertStatus(
        status: Http::NOT_FOUND
    );
})->with('uuids');//9
