## - Episode 4, Refactoring to Event Sourcing (Part 1)
    - php -v
    -Test to update the Contact is missing
    -** brew services restart php
    -** https://stitcher.io/blog/php-81-upgrade-mac
    -** ginx: [error] open() "/usr/local/var/run/nginx.pid" failed (2: No such file or directory)
## TO INSTALL PACKAGES
    -https://spatie.be/open-source?search=&sort=-downloads
    -https://spatie.be/docs/laravel-event-sourcing/v5/installation-setup
        -composer require spatie/laravel-event-sourcing
## EVENT SOURCING
    - We are going to look only for StoreController and UpdateController
    -  Let u build our container 
        docker-compose --build --no-cache
    -Start creaing sourcing by creating a src directory will attach Domains in Composer.json file
    -Move the  ValueObjects to src/Domains  Domains\Contacts\ValueObjects select src/Domains
        Move class ValueObjects to name Domains\Contacts\ValueObjects
    -Move the  Factories to src/Domains    Domains\Contacts\Factories select src/Domains
        Move class Factories to name Domains\Contacts\Factories
    -Move the  Enums to src/Domains        Domains\Contacts\Enums select src/Domains
          Move class Prounouns to name Domains\Contacts\Enums
    -Run Test failed
    -Run  composer update
    -Run  composer dump-autoload -o
    -Run  test again - OK

## MOVE OUR ACTIONS INTO DOMAIN
        - Create a folder called Actions  into Contacts
            Move the  Actions (CreateNewContact) to src/Domains  src/Domains/Contacts/Actions/CreateNewContact.php
        -Create a Infrastructure Directory in src/Infrastructure, move all the contracts into it.
          remember to register into Composer.json
        -Run  composer dump-autoload -o
        -Run  test again - OK

## AGGREGATES 
        - We're talking about actionable thing we gonna fire via event sourcing
        -Create a folder called Aggregates  into Contacts
            -create a class called ContactAggregateRoot  which extends Spatie\EventSourcing\AggregateRoots\AggregateRoot
            -Start the Journey of Event Souccing
               class ContactAggregateRoot extends AggregateRoot
                    {
                    35min
                    }
            -src/Domains/Aggregates/ContactAggregateRoot.php
            -Publish the spatie/event-sourcing package
                -composer require spatie/event-sourcing 
                 -php artisan vendor:publish --provider="Spatie\EventSourcing\EventSourcingServiceProvider" --tag="event-sourcing-migrations"
                 -Run  make migrate 
                 -Run  php artisan vendor:publish --provider="Spatie\EventSourcing\EventSourcingServiceProvider" --tag="event-sourcing-config"
                 -Create a Events Directory :->src/Domains/Contacts/Events/ContactWasCreated.php
                 -Create a Handler Directory :->src/Domains/Contacts/Events/ContactWasCreated.php
                        extends Spatie\EventSourcing\EventHandlers\Projectors\Projector
                 - Run make analyze
                 - Failed 
                    Line   src/Domains/Contacts/Handlers/ContactHandler.php
                    Access to an undefined property Domains\Contacts\Aggregates\ContactAggregateRoot::$object.
                -Problem , i was calling different parameter in  ContactHandler.php
                -Run make analyze   
                - Passed analyse.
                - Run Test - passed

## MAKE EVENT SOURCING PROVIDER
      - We need to crreate an EventSourcingServiceProvider
         php artisan make:provider EventSourcingServiceProvider
      - Register first into config /app.php file
            App\Providers\EventSourcingServiceProvider::class,
      -write some logic in EventSourcingServiceProvider to register the projectors , one or more prjectors
          https://spatie.be/docs/laravel-event-sourcing/v4/using-projectors/creating-and-configuring-projectors#breadcrumb
      -Run make Test after Registering
      -Failed Test
            TypeError
                Spatie\EventSourcing\Projectionist::addProjector(): Argument #1 ($projector)
                must be of type Spatie\EventSourcing\EventHandlers\Projectors\Projector|string, array given,
      -Problem /Solution: Passing an array which doesnt like in EventSourcingServiceProvider ,Just remove an array
      -Run make Test - Passed
## TO CHANGE TO OUR CONTROLLERS
    - Because we are using EventSourcing , we need to change the method to use EventSourcing.
    - In the StoreController
        CHANGE oor DTO
           DTO
               $contact = CreateNewContact::handle(
               object: ContactFactory::make(
                   attributes: $request->validated(),
               ),
             );
                new ContactResource(
                resource: $contact,
                 status: Http::CREATED
                ),

           TO
        $aggregate = ContactAggregateRoot::retrieve(
           uuid: Str::uuid()->toString(),
       )->createContact(
           object: ContactFactory::make(
               attributes: $request->validated(),
           ),
       );

        $aggregate->persist();
        return new JsonResponse(
           //data: [],
           data: null,
           status: Http::ACCEPTED  // WILL running background
       );
   
    -Run make test - Failed
        Expected response status code [201] but received 202.
        Failed asserting that 201 is identical to 202.
    -Problem appeared in tests/Feature/API/ContactTest.php:83
           in the test `can create a new contact` we need to change the status code Http::CREATED to Http::ACCEPTED
    -Run make test - Failed
        Property [type] does not exist.
        Failed asserting that false is true.
    -Problem /Solution: The AssertableJson Need to REMOVE 
          ->assertJson(fn(AssertableJson $json) =>
        $json
            ->where(key: 'type', expected: 'contact')
            ->where(key: 'attributes.name.first', expected: $string)
            ->where(key: 'attributes.name.last', expected: $string)
            ->where(key: 'attributes.phone', expected: $string)
            ->etc(),
            );
    -Run make test - Passed
    -Althought it has  passed , we need to change the expect() to USE the EloquentStoredEvent
         
        ///Featured Test
         expect(Contact::query()->count())->toEqual(0); //when I start the test, there are no contacts   0
          TO
         ///EventSourcing  Test
          expect(EloquentStoredEvent::query()->count())->toEqual(0);
    -Run make test - Passed
       
## TO TEST OUR PROJECTORS
    - We need to create a HandleTest
            tests/Feature/API/HandlersTest.php
    -Write a test
        `it can store a new contact`
           
          CAN BE DONE LIKE THIS 
        $handler = new \Domains\Contacts\Handlers\ContactHandler();
        $handler->OnContactWasCreated(event:  $event);

          OR WE CAN INVOKE THE HANDLER   
         (new ContactHandler())->OnContactWasCreated(
        event: $event,
            )
    - Run make test - Passed

## TEST OUR ACTIONS
    src/Domains/Contacts/Actions/CreateNewContact.php
    -Let test our ActionTest
        `it can create a new contact`
    -write a test as it should be
    -Run make test - Passed
    -Run make Analyse - Passed

