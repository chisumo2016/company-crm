### DOCKER TOOLS
    -By Dan Wahlin
    -Docker Client
    -Docker Kitematic
    -Docker Machine
## DOCKER CLIENT  -MAC 
    - The way to interact with engine behind the scenes /deamon
    - Interact with  docker engine
    - Build and Manage Images
    - Run and Manage containers
# DOCKER CLIENT COMMAND
    - docker pull [image name]
    - docker run [Container name]
    - docker run [image]
    - docker images

    - docker ps  list all the containers
    - docker ps -a list all the containers
    - docker start [container]
    - docker stop [container]
    - docker rm [container]
    - docker rmi [image]

### HOOKING YOUR SOURCE CODE INTO A CONTAINER
##The Layered File System
    - Files are build each other
    - Image Layers is READ ONLY
    - Container Layers is READ / WRITE Layer
    - Container can share image layers
    - How do you get source code into a container ?

##Container and Volumes
    - What is a Volume ?
        * Special type of directory in a container typicall referred to as a "Data Volume".
        * Can be shared and reused  among containers  
        * Updates to an image won't affect the data volume
        * Data volumes are persisted  even after the container is deleted
    - Volume Overview
        You have container ---->Volume(/Var/www) can be wtitten to docker host
        Docker Host ---> container ----> Volume(/var/www)
        Detele the container - the volume is still there

##Source Code , Volumes and Containers
    - To start an image from a container
        - docker run -p 8080:3000 node
    -Create a Data Volume
        - docker run  -p 8080:3000 node -v /var/www web
            -v  Create a volume 
            -/var/www  Container volume
        - Gonna write to host area
    - Locating a Volume
        docker inspect [container]
## CUSTOMIZING VOLUMES

    - Volume /var/www - store /src in Docker Host
## CUSTOMIZING THE HOST LOCATION FOR A DATA VOLUMES
    docker run -p 8080:3000 node -v /var/www:/src/web node
    docker run -p 8080:3000 node -v $(pwd):/var/www node
    docker run -p 8080:3000 node -v $(pwd):/var/www -w "/var/www" node npm start
        -v  Create a volume 
        -$(pwd)  Host Location
        -/var/www Container Volume  
        -docker inspect [container]
    - "Source": "/Users/os/Documents/projects/company-crm-api", ===>Host Location
    - "Destination": "/var/www/vhost/company-crm",          ===>Volume Location In Container
##NB : blog.codewithdan.com/docker-volumes-and-print-working-directory-pwd
    docker run watch


##Removing Containers and Volumes
    - docker rm -v [container]


### BUILDING CUSTOM IMAGES WITH DOCKERFILE
    - Getting Started with Dockerfile
    - Creating a Custom Dockerfile
    - Build a Custiom Image
    - Publishing an image to Docker Hub
    - How do you get source code into a container ?

##DOCKERFILE 
    - Dokckerfile  ---docker build---> Docker Image
    - Text File used to build docker immages
    - Contains build instructions
    - Instruction create intermiaate image that can be cached to speed up future builds
    - Used with "docker build" command

## KEY DOCKERFILE INSTRUCTION
    FROM   alpine:latest  
    LABEL  author="Dan Wahlin"
    RUN   npm install
    COPY    . /var/www    .current directory copy to /var/www 
    ENTRYPOINT ["npm", "start"]
    WORKDIR  /var/www
    EXPOSE  $PORT
    VOLUME
    ENV  NODE_ENV=production
    ENV  PORT=3000

## BUILDING A CUSTOM IMAGE
    docker build -t <your username>/<your image name> . 
      -t short for --tag
      -<your username> Tag Namme
      - . build context
    docker rm f4

## COMMUNICATING BETWEEN DOCKER CONTAINERS
        - How do we communicate between containers ?
        - Getting Started with Container Linking
            - Linking by Name (Legacy Linking)
            - Container Linking in Action
            - Getting Started with Container Networks
            - Container Networks in Action
            - Linking Multiple Containers

## Getting Started with Container Linking
     example Database container, cache container, webserver container 
    - we need to tall each other

    #Docker Container Linking Options
        1:Use Legacy Linking - very easy to setup
        2:Add Containers to a Bridge Network  ,isolated network ,container can communicate with each other

    # Linking by Name (Legacy Linking)
        - Steps to Linkl Containers
           1:Run a Container with a Name
                docker run -f --name <container name> <image>
                    --name Define a name for the container  
                docker run -f --name my-postgres postegres

           2:Link to Running Container by Name
                docker run -d -p 5000:5000 --link my-postgres:postgres  benchisumo/web
                    --link       Link to name container
                    my-postgres  Name of linked container
                    :postgres    Linked container alias

           3:Repeat for Additional Containers 
                Run a Container with a Name
                Link to Named Container 
                Repeat 
## LINKING NODE.JS AND MONGODB CONTAINERS
    - build: 
        docker build -f node.dockerfile -t danwahlin/node .  
        docker build -f aspnetcore.dockerfile -t danwahlin/node .  
    - Start Mongodb : 
        docker run -d --name my-mongoDB mongo
        docker run -d --name my-postgress -e POSTGRES_PASSWORD=mypassword postgres
    - Start Node and Link to MongoDB Container : 
        docker run -d -p 3000:3000 --link my-mongodb:mongodb  danwahlin/node  
        docker run -d -p 5000:5000 --link my-postgress:postgress  danwahlin/aspnetcore  
    - docker ps
    - docker exec   allow to execute a command in a running container
    - docker ps
    - docker exec d6 node db.js

## GETTING STARTED WITH CONTAINER NETWORKS /BRIDGE NETWORKS
    - Grp the container in Isoloated Networks
    - It gives the flexible to allow who to communicate
    - Example Docker Host
                            -------------------- create an Isoloted Network 1 
                            -------------------- create an Isoloted Network 2 
                            -------------------- create an Isoloted Network 3
                            -------------------- create an Isoloted Network 4

## STEPS TO CREATE A CONTAINER NETWORK
    1:- Create a Custome Bridge Network
        - use the docker client to create a bridge network
            docker network create --driver bridge isoloted_network
                - create - create a custom network
                - bridge - use a bridge network
                - isoloted_network - Name of Custom network  , name can be anything (Image ,Container)

    2:- Run Containers in the Container Network
          - Run the container in the specific network
                docker tun -d --net=isoloted_network --name mongodb mongo
                    ---net run container in the network
                    --name mongodb   "Link" to this container by name

## CONTAINER NETWORKS IN ACTION
    - We gonna use bridge drivers
    - Docker client command 
        - docker network ls
        - docker network create --driver bridge isoloted_network  
        - docker network ls
        - docker network inspect isoloted_network
    -Run some container in that network
        - docker run -d --net=isoloted_network --name mongodb mongo
        - docker run -d --net=isoloted_network --name postgres -e POSTGRES_PASSWORD=mypassword postgres
            - docker network inspect isoloted_network
        - docker run -d --net=isoloted_network --name nodeapp -p 3000:3000 danwahlin/node
            docker run -d --net=isoloted_network --name aspnetcore -p 5000:5000 danwahlin/aspnetcore   webserver     
            - docker ps
            - docker exec -it nodeapp node dbseeder.js  
        - docker run -d --net=isoloted_network --name postgres postgres
        - docker network inspect isoloted_network

## LINKING MULTIPLE CONTAINERS
    - Multiple containers can be linked to each other
    - Is there an easier way to link containers?    
      eg. WEBSERVER ,DATABASE CACHING
    - Docker compose can simplify container linking
    -it help multiple containers to communicate eg 5 containers

## SUMMARY
    - Docker containers communicate using link or network functionality
    - The --link switch provides "legacy Linking"
    - The --net command-line switch can be used to setup a bridge network
    - Docker compose can be used top link multiple containers to each other.

### MANAGING CONTAINERS  WITH DOCKER COMPOSE
    - it helps to manage multiple containers
    -Module Agenda
        - Getting started with Docker Compose
        - The docker-compose.yml file
        - Docker Compose Commands
        - Docker Compose in Action
        - Setting Up Development Environment Services
        - Creating a Custom docker-compose.yml file
        - Managing Development Environment Services 

## Getting started with Docker Compose
    - it helps to manage the lifecycle of the application
    - Docker Compose Features 
        1:- Manages the whole application lifecycle
                - starting, stopping, restarting, rebuild services and more
                    -Services becoming the running container
                - View the status of running serrvices
                - Stream the log output of running services
                - Run a one-off command on a service
    # The Need of Docker Compose
        Example 
                NGINX (web server frontend , php node java)  <---------->        redis for caching in backend
                                                             <----------->       mongo db  for backend database
                - Docker compose  (docker-compose.yml)  manage all these services
                - docker file you can define all the services
                - On this file we can define the relationships between the services 
    # DOCKER COMPOSE WORKFLOW
        - Build Services - we create the images----->Start Services - we run the containers--->Stop Services - Tear Down Services
   
 ###THE DOCKER COMPOSE YML FILE
    # The Role of the Docker Compose File
        docker-compose.yml is a YAML file that describes the services that compose your application.
        (service configuration)
           docker-compose.yml =====> Docker Compose Build=====>Generate Docker Images(services)
    
  ## DOCKER COMPOSE AND SERVICES
    - what goes in docker-compose.yml file
        version: "3.X"
        services: 
            - name: "nginx"
              image: "nginx:latest"
              ports:
                  - "80:80"
              links:
                  - "redis:redis"
                  - "mongo:mongo"
            - name: "redis"
              image: "redis:latest"
              ports:
                  - "6379:6379"
            - name: "mongo"
              image: "mongo:latest"
              ports:
                  - "27017:27017"
   ## KEY SERVICE CONFIGURATION OPTIONS
        Build  
        Environment
        Image
        Networks
        Ports
        Volumes
 ## DOCKER-COMPOSE.YML EXAMPLE
        version: "3.X"
        services:
            node:
              build: 
                context: . // current directory
                dockerfile: node.dockerfile
              networks:
                - nodeapp-network

            mongodb:  //will be in docker hub not a custom image
              image: mongo:latest
              networks:
                - nodeapp-network //will allow to communicate with other container 
              ports:
                - "27017:27017"

            networks:
              nodeapp-network
                drive: bridge
    - NB: All these network can communicate with each other

### DOCKER COMPOSE COMMANDS
     - Once the yml file is ready  we can run some commands   
     - Key Docker Compose Commands
            * docker-compose build  - build services and images 
            * docker-compose up     - Run the containers
            * docker-compose down   - Run the containers
            * docker-compose logs   - show the logs of the containers
            * docker-compose ps     - show the status of the running service
            * docker-compose stop   - stop the  running services
            * docker-compose start   - start the  running services
            * docker-compose rm   - remove the different containers

### BUILDING SERVICES
    Build Servics =====>Start Services =====>Tear Down Services
    * docker-compose buid 
        - Build or rebuild services defined in the docker-compose.yml file
    * docker-compose build mongo
        - Build or rebuild the mongodb service as individul services (Only build/rebuild mongo service)

### STARTING SERVICES UP 
    * docker-compose up
        - Create and start the containers 
        - Start the containers defined in the docker-compose.yml file

    - Creating and starting Containers
        * docker-compose up --no-deps node
            - Rebuild node image and stop, destroy and recreate only node 
            - Do not recreate services that nodes depends on

### TEARING UP THE SERVICES
    - Stop and Remove Containers
        * docker-compose down
            - Take all of the containers down (stop and remove)
            -If you dont want top remove the container ,you can use stop command
                * docker-compose down

    -Stop and Remove Containers , images ,Volumes
        * docker-compose down --rmi all --volumes

            - Take all of the containers down (stop and remove)
            - all
                -Remove all images (images that were built)  
            - --volumes
                -Remove all volumes (data that was built) 

### DOCKER COMPOSE IN ACTION
    * docker-compose build
    * docker images
    * docker-compose up -d
    * docker-compose down
    * docker-compose ps
    * docker-compose logs
    * docker-compose down --rmi all --volumes
    * docker ps
    * docker images
    
### SETTING UP DEVELOPMENT ENVIRONMENT SERVICES
    docker  - Dir
    nginx   - Dir
        conf.d  - Dir
            site.conf  
        ssl     - Dir
           app-cert.pem
           app-key.pem
           opensl.cnf
        Dockerfile  
        nginx.conf
    php
        config
            opcache.ini
            redis.ini
        Dockerfile
        local.ini
    docker/Dockerfile

### CREATING A CUSTOM DOCKER-COMPOSE.YML FILE
    -Create a docker-compose.yml file

### MANAGING DEVELOPMENT ENVIRONMENT SERVICES
    - docker-compose build
    - docker images
    - docker-compose ps -a
    - docker-compose up interactive  mode
    - docker-compose up -d deamon mode
    - docker-compose down
    - docker-compose logs
    - docker-compose down --rmi all --volumes
    - docker ps -a
    - docker rm -f $(docker ps -a -q)
    
    NB ERROR 
    /etc/nginx/conf.d/default.conf is not a file or does not exist
    No default certificate, generating one

### SUMMARY
    Docker Compose simplifies the process of building ,starting and stoping services
    Docker-compose.yml defines services and how they are connected to each other
    Excellent way to manage services used in a development environment
    Key Docker Compose commands include "build" , "up" , "down" , "logs" , "ps" , "stop" , "start" , "rm"
