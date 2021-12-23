<?php
declare(strict_types=1);

use App\Enums\Pronouns;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use \JustSteveKing\StatusCode\Http;

use function Pest\Laravel\getJson;

it('gets an Unauthorized response when not logged in on the index', function () {
    getJson(
        uri: route('api:contacts:index'),
    )->assertStatus(
        status:Http::UNAUTHORIZED,
    );
});


it('it can retrieve  a list of contacts of users', function (){
    //auth()->loginUsingId(User::factory()->create()->id);
    auth()->login(User::factory()->create());

    Contact::factory(10)->create();

   getJson(
       uri: route('api:contacts:index'),
   )->assertStatus(
       status:Http::OK
   )->assertJson(fn (AssertableJson $json) =>
          $json->count(10)->first(fn (AssertableJson $json) =>
              $json->where(key: 'type', expected: 'contact')->etc(),
          ),
        );
});

it('can create a new contact',  function(string $string){
    auth()->login(User::factory()->create());
    expect(Contact::query()->count())->toEqual(0); //when I start the test, there are no contacts   0

    //Send a request to create a new contact
    \Pest\Laravel\postJson(
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
        status: Http::CREATED
    )->assertJson(fn(AssertableJson $json) =>
        $json
            ->where(key: 'type', expected: 'contact')
            ->where(key: 'attributes.name.first', expected: $string)
            ->where(key: 'attributes.name.last', expected: $string)
            ->where(key: 'attributes.phone', expected: $string)
            ->etc(),
    );

    //Check that the contact was created in database
    expect(Contact::query()->count())->toEqual(1);
})->with('strings');
