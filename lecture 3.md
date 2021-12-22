## Lecture 3 
    - Spinning with Docker 
    - docker-compose up -d
## TEST 
    -Featured Test Folder

    -Route [api:contacts:index] not defined.
    -create a routes
    -Route::get('/', App\Http\Controllers\Api\Contacts\IndexController::class)->name('index');
    -create a controller
    - php artisan make:controller Api\\Contacts\\IndexController --invokable
    -Run Test
    -Run php artisan route:list --compact --columns=method,uri,action
    -Run php artisan route:list --columns=uri,name,method
    -add  ->as('api:') into RouteServiceProvider.php
    -Run test again
        The following exception occurred during the request
        BadMethodCallException: Call to undefined method Stancl\Tenancy\Database\Models\Tenant::domains() 
    -Soln comment the following RouteServiceProvider.php
          //InitializeTenancyByDomain::class,
          //PreventAccessFromCentralDomains::class
    -Run test again   Passed
    -Group all into Middleware in api websfile
    -Run static analysis  make analyse
    -Error:
      Method App\Http\Controllers\Api\Contacts\IndexController::__invoke()
            should return Illuminate\Http\Response but return statement is missing.
    - Run Test again
        Expected response status code [200] but received 401.
        Failed asserting that 200 is identical to 401.
    -Soln  401 is authorized response code, create a auth() in the test
        auth()->loginUsingId(\App\Models\User::factory()->create()->id);
    - Run test again -error   
        SQLSTATE[42S02]: Base table or view not found: 1146 Table 'company_crm_api.users' doesn't exist
    -Soln  we moved all the model into multi tenancy folder in migration .To resolve
      that we need to put back as it was in before.
      Also setup the phpunit.xml;
       <server name="DB_CONNECTION" value="sqlite"/> 
         <server name="DB_DATABASE" value=":memory:"/> 
    - Run test again -error
        SSQLSTATE[HY000]: General error: 1 no such table: users (SQL: insert into "users" ("name", "email"
    -soln run make migrate
        - run make php
        -run  docker exec -it company-crm_php /bin/sh
            $ php artisan migrate:fresh
        - Add some LazilyRefreshDatabase in Pest.php
        - Run test again - Passed 
    - Create 10 contacts in ContactsTets.php
        Contact::factory(10)->create();
      add ->assertJson()
    - Run test again - error
         SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: contacts.uuid 
    -Soln  create a ContactFactory and Model ,we need to add the CONCERNS folder
        - create a HasUuid trait
        - run make analyze
        - Error
            Method App\Http\Controllers\Api\Contacts\IndexController::__invoke() 
                should return Illuminate\Http\Response but return
              statement is missing. 
        - Run SOLN to add the trait to the model
            - add trait to the model
            - run make analyze
            - Run test again - error
                Tests\Feature\API\ContactTest > it it can retrieve  a list of contacts of users
                    Invalid JSON was returned from the route.
            -Soln is to return the json in IndexController by using the query Builder 
               with Spatie\QueryBuilder\QueryBuilder
                  composer require spatie/laravel-query-builder  
                - add ->with('contacts')
                - run make analyze
                - Run test again - Passed
                - Run make generate  
                - write code in IndexController
                - Run test again -ERROR
                   Root level does not have the expected size.
                        Failed asserting that actual size 0 matches expected size 10.
                -Soln we need to create Contactresource again
                        php artisan make:resource   Api\\ContactResource
                - Run test again - Failed
                    Property [0.type] does not exist.
                        Failed asserting that false is true.
                -Soln we need to add some logic into  ContactResource to clear the error above
               -Run make analyze
                     Access to an undefined property Illuminate\Database\Eloquent\Model::$uuid.
               -Soln is to excludepath in phpstan        
               -Run make analyze  passed        
               -Run make test   failed  
                    Property [0.type] does not exist.
                    Failed asserting that false is true.
               - Use composer require timacdonald/json-api in ContactResource
               - Install Enum package for pronouns will controll the string value
               - composer require spatie/laravel-enum
               - create a folder in app called Enums
               - extends to Spatie\Enum\Laravel\Enum
               - Run Test again - Failed
                     Property [0.type] does not match the expected value.
                    Failed asserting that two strings are identical.
               -Soln lOOK ContactResource.php 
                    -Install https://github.com/timacdonald/json-api
                    -Compare with the Contact Model attributes
                    -add to the ContactResource.php
                    -override the  method from JsonApiResource
                      protected function toType(Request $request): string
                        {
                            return 'contact';
                        }
                    -Run Test again - Passed    

## Writing Seeder In Production Way
    - Check good way to write a seeder in production in ContactSeeder File 
        Contact::factory(50)->create();
    - In Database Seeder 
    - Add seed in MakeFile   
    - Run make migrate:fresh  
    - Run make seed  
