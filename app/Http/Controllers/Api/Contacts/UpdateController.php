<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contacts\UpdateRequest;
use App\Models\Contact;

use Domains\Contacts\Aggregates\ContactAggregateRoot;
use Domains\Contacts\Factories\ContactFactory;
use Illuminate\Http\JsonResponse;

use JustSteveKing\StatusCode\Http;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param string  $uuid
     * @return JsonResponse
     */
    public function __invoke(UpdateRequest $request, string $uuid):JsonResponse
    {
        $contact = Contact::query()
            ->where('uuid', $uuid)
            ->firstOrFail();

        ContactAggregateRoot::retrieve(
            uuid: $uuid,
        )->updateContact(
            object: ContactFactory::make(
                attributes: $request->validated(),
            ),
            uuid: $uuid,
        )->persist();

        /*$valueObject = ContactFactory::make(
            attributes: $request->validated(),
        );

        \Domains\Contacts\UpdateContact::handle(
            contact: $contact,
            attributes: $valueObject->toArray(),
        );*/

        return new JsonResponse(
            data: null,
            status: Http::ACCEPTED,
        );
    }
}
