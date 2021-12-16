## Data Modelling 
    # SETUP
     1. Create a new project
     2. Install Docker
        A. Create a Docker Directory in root of the project
            i. create docker-compose.yaml file
                        *Define Services
            ii . create php folder
                        *Define Services

-Create A MakeFile on the root of project
    -Run
https://api.company-crm.localhost

##SETTING GENERATORS 
    - https://github.com/barryvdh/laravel-ide-helper

## Functionality
  # Tasks
     - Authentication
     - Create your account space
     - Invite your team mates
     - Roles and Permissions    
     - Companies
     - Departements
     - Teams
     - Contacts 
     - Contacts 
     - Job Titles
     - Projects 
     - Interactions

  # Data Modelling 
        User:
            attrubutes:
                - id: int 
                - name: string
                - email: string
                - password: string
               
        Tenant:
            attrubutes:
                - id: int 
                - uuid:string
                - anthing required by the package
    - Have Tenancy for laravel
    - Install the multi tenancy package
        - https://tenancyforlaravel.com/docs/v3/installation      
    - Let move things into tenanct folder in the projects
    - Create a Tenant Model
        - https://tenancyforlaravel.com/docs/v3/tenant-model
        - php artisan make:model Tenant
