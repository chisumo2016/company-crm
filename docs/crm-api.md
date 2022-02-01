## BUILDING A CRM API PLATFORM
    # SETUP THE CRM API PLATFORM IN PRODUCTION
     1. Create a new project
     2.START  Docker
     2. Setup  Docker
        A. Create a docker-compose.yaml file in root of the project & define the services
                - Version: "3
                - services:
                - networks:
                - volumes:
                    - Add the folowing to the env file  PROJECT_NAME, APP_DOMAIN 
        B. Create a Docker Directory in root of the project
            ii . inside the docker directory , create the following folder
                        * nginx directory
                             * conf.d directory 
                                * site.conf file
                             * ssl directory 
                                * app-cert.pem
                                * app-key.pem
                                * openssl.cnf
                             * Dockerfile    
                             * nginx.conf   
                        * php  directory
                            * config directory
                                * opcache.ini    
                                * redis.ini    
                            * Dockerfile
                        * Dockerfile
        C. change into docker directory via command cd docker
            - cd docker/nginx/ssl/
            - docker/nginx/ssl  ll
                - app-cert.pem
                - app-key.pem
                - openssl.cnf
        D. change into ssl directory via command to generate ssl certificate CLI Tools
                -we gonna use mcert 
                - cd docker/nginx/ssl/  
                - run mkcert "*.company.crm" "*.company.crm"
                    - * subdomain .domain.trd
                - will generate the following files
                    - app-cert.pem
                    - app-key.pem
                    - openssl.cnf 
        E. change into crm and run docker
            - docker-compose build
            - docker-compose up -d

        F. Acess the application on web
                - https://company-crm.localhost
                -Error:
                    - Your connection is not private 
                    - Fixed by changing vhosts to vhost
        G. Woring on docker exec command is awful
                -Create A MakeFile on the root of project
                    -Makefile file and list all command on it
                 https://api.company-crm.localhost

        H. Install packages
            - composer require juststeveking/http-status-codes
            - composer require juststeveking/http-status-codes
            - composer require barryvdh/laravel-ide-helper --dev
            - composer require barryvdh/laravel-debugbar   --dev
            - composer require pestphp/pest --dev --with-all-dependencies
            - composer require pestphp/pest-plugin-laravel  --dev
            - php artisan  pest:install  say no
            - composer require nunomaduro/larastan --with-all-dependencies --dev

        I: Create a  phpstan.neon file on the root of project
        J: Create a src directory in root of our project
                - create a folder Domains
                - load the Domains folder into composer.json
                    "Domain\\": "src/Domains"
        K: Run the following command 
            - make test
            - make analyze
            - Make some changes in RouteServiceProvide.php eg configureRateLimiting():void
        L: Access the traefik dashboard
            - http://localhost:8080/dashboard/#/
            - docker is missing
                make ngnix
                ls
                cd company-crm
                ls
                docker-compose down
                docker-compose build
                docker-compose up -d
                *https://company-crm.localhost
                *https://api.company-crm.localhost

## WEB ROUTE FILE
    -Route::get('/', function () {
        dd(request()->server()));
        dd(request()->root());
    });

##==============================fishing=======


##SETTING GENERATORS 
    - https://github.com/barryvdh/laravel-ide-helper
    - read the documentation
    - add to composer.json under post-update-cmd
    -composer update

## Functionality
  # Tasks
     - Authentication
     - Create your Account space
     - Invite your team mates
     - Roles and Permissions    
     - Companies
     - Departements
     - Teams
     - Contacts 
     - Contacts 
     - Job Titles
     - Interactions
     - Projects 
     - 

  # Data Modelling 
        User:
            attrubutes:
                - id: int 
                - name: string
                - email: string
                - password: string
               
        Tenant: (Mult tenant)
            attrubutes:
                - id: int 
                - uuid:string
                - anthing required by the package
    - Have Tenancy for laravel
    - Install the multi tenancy package
        - https://tenancyforlaravel.com/docs/v3/installation      
        - Read the installation    guide 
    - Let move things into tenanct folder in the projects
    - Create a Tenant Model
        - https://tenancyforlaravel.com/docs/v3/quickstart
        - read the documentation  for setting up the tenant model
        - php artisan make:model Tenant

## MAKE CHANGES ON OUR ROUTES 
    - change the routes in RouteServiceProvider
            - app/Providers/RouteServiceProvider.php
            - app/Providers/TenancyServiceProvider.php some housing cleaning
    - run make analyse
    - map web routs in RouteServiceProvider
        - app/Providers/RouteServiceProvider.php
        - foreach()
    - run make analyse
    - run make test 
    - fail the test
    - fix we have to go on tenacy.php -> 
        'central_domains' => [
        env('APP_DOMAIN'),
    ],
    - run make test 
    - we need to add the middleware 
        - a  - https://tenancyforlaravel.com/docs/v3/quickstart
        - read the documentation 
       - app/Providers/RouteServiceProvider.php
       [
            'api',
            InitializeTenancyByDomain::class,
            PreventAccessFromCentralDomains::class
       ]
    - run make analyse      
    - run make test 
    - Create the api web route ping 
            - make php
    docker exec company-crm_php php artisan migrate:fresh
    make generate
    make analyse
    make test

## CREATE ALL DATA MODELS 
    - php artisan make:model User    -mfs 
    - php artisan make:model Tenant  -mfs 
    - php artisan make:model Company  -mfs 
    - php artisan make:model Department  -mfs 
    - php artisan make:model Team   -mfs 
    - php artisan make:model Contact  -mfs 
    - php artisan make:model JobTitle  -mfs 
    - php artisan make:model Project  -mfs 
    - php artisan make:model Interaction  -mfs 
    - # NB : Move all three  migrations belongs to a  Tenant folder Company Department

## API DESIGN 
    - Paths :
        /api/contacts
        /api/contacts/{contact-uuid}

        /api/projects 
        /api/projects/{project-uuid}  

        /api/interactions 
        /api/interactions/{interaction-uuid}  
   
