<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Contacts;

use Domains\Contacts\Aggregates\ContactAggregateRoot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contacts\StoreRequest;

use Domains\Contacts\Factories\ContactFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use JustSteveKing\StatusCode\Http;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $aggregate = ContactAggregateRoot::retrieve(
            uuid: Str::uuid()->toString(),
        )->createContact( //Emit an event
           object: ContactFactory::make(
               attributes: $request->validated(),
           ),
       );
        $aggregate->persist();

        return new JsonResponse(
           //data: [],
           data: null,
            status: Http::ACCEPTED //running background job
        );
    }
}

/*
 * DTO
 $contact = CreateNewContact::handle(
           object: ContactFactory::make(
               attributes: $request->validated(),
           ),
       );
 new ContactResource(
   resource: $contact,
     ),
 */
