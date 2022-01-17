## DOCKER OBJECTIVES
 ## Labs https://labs.play-with-docker.com/
    - What are containers
    - What is Docker?
    - why do you need it ?
    - What can it do ?
    - RUN docker and containers
    - Create a Docker image
    - Networks in Docker
    - Docker Compose
    - Docker Concepts in Depth
    - Docker for windows/Mac
    - Docker for Swarm
    -Docker vs Kubernetes  
    -Containers & Virtual Machines

    -Public docker registry - https://hub.docker.com/
    -Container vs Image 
    -Docker Image is Package Template Plan

## WHAT IS DOCKER
    - Docker is a tools for running applications in an isolated environment
    - Docker is a containerization platform.
    - It enables to package ,(build) , your applications into images and run them as "containers"
    - On any platform that can run Docker
    - Docker is a platform for running applications
    - App run in same environment 
    - Standard for software deployment
    - Docker is blue print for container
    
## BENEFITS
    - Run  container in seconds instead of minutes   
    - Less resources results less disk space    
    - Uses less Memory
    - Does not need full OS
    - Deployment
    - Testing

### DOCKER WORKS
    "App Code",DockerFile =====> Docker Engine =====>BUILD  =====>Docker Image =====> RUN =====>Docker,Operating Syste
    - Run multiple containers in one image
    - Docker compose file
   - 
### BENEFITS OF DOCKER COMPOSE
     - Reduces reliance on , and simplifies use of , DOCKER CLI
     - Allows you to start multiple containers quickly
     - Provides networking between containers

##  START WITH DOCKER
    -Two types of docker
        -Community Edition (Linux , Mac , Windows ,)
        -Enterprise Edition
## CERTIFICATES 
    - Personal Certificates
    - Trusted Root Certificates

## CREATE LOCAL CERT
    - https --trust
    - docker run -p 8080:80 -p 8081:443  company-crm-api
    https://medium.com/@jonsamp/how-to-set-up-https-on-localhost-for-macos-b597bcf935ee
    dev-certs https --trust

##  INSTALL DOCKER
        -docs.docker.com/install/
        -docker version
        - docker --version 
        - if you turn off the docker and run docker ps
             Error response from daemon: dial unix docker.raw.sock: connect: connection refused
        - Make sure docker deamon is running

## IMAGES
    - What is an image ?
        - is the snapshot of a container 
        - is a template for creating a  environment of your choice eg databse , web application ,app does processing
        - container is made from image
        - Has everything that you need to run your application      
        - OS , software , App Code
        NB:Container is running  instance of an Image
            IMAGE -> RUN -> CONTAINER
            DOWLOAD -> IMAGE -> RUN -> CONTAINER    
    - How to create an image ?  
    - How to create an image from a Dockerfile ?
    - How to create an image from a tar file ?

#IMAGES COMMANDS
    - -Please read the docs.docker.com/install/
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a

## PULLING DOCKER IMAGES
    - navigate to hub.docker.com  is a registry -> download images
    -$ docker pull nginx
    -$ docker pull ubuntu
    -$ docker pull ubuntu:12.04  image:tag
    -$ docker images
    -$ docker rmi <imageId> <imageId>
    -$ docker images
    -$ docker pull ubuntu:12.04
    NB: You can run the containers on these images
        example : nginx , ubuntu 

## WHAT IS CONTAINERS ?
        - Are an abstraction at the app layer that packages code and dependencies together.
        - Multiple  containers can run on the same machine and share the OS kernel with other container,
           each running as isolated processes in user space . APP A, APP B, APP C, APP D  
        - Containers does not require a separate OS kernel. 
        - Docker manage all the containers you spin up.
        - Container is running instance of an Image

#CONTAINERS COMMANDS
    - List all containers
        - docker ps -a
    -Create/Run  a containers from Images
        $ docker pull ngnix
        - docker run --help
        - docker run -it ubuntu
        - $ docker run nginx:latest
        - $ docker run  -d nginx:latest  (running in detached mode)
        - docker container ls
        - docker run -it <ImageId> /bin/bash -WILL give you a shell
                - # ls
                - # cat /etc/apt/
                - # exit;
        - docker ps -a
## RUN THE CONTAINER 
    - docker container run -it --name test alpine sh
    - #ls -l
    - #ping google.com
    - #ctrl + P + Q

## VIEW A LIST  CONTAINER
    - docker container ls
    - docker ps -a is the better way

## EXPOSING PORTS
    - We have docker running with our host machine
    - Container ->  we are running nginx 
    - Container - exposing ports 80 
        example 80/tcp 
    - Host machine - exposing ports 8080
        example 8080/tcp localhost:8080 port 8080 on host maps to port 80 on container
        - P 8080:80
        - P HOST:CONTAINER
        - P OUTSIDE:CONTAINER


## EXPOSE PORTS       
    - docker run -p 8080:80 -d nginx:latest
    - docker run -p 3000:80 -d nginx:latest

## EXPOSING MULTIPLE PORTS
    - localhost:8080
        port 8080 on host maps to port 8080:80 on container  
         -p 8080:80
    - localhost:3000
        port 3000 on host maps to port 8080:80 on container  
         -p 3000:80 
    - docker run -d -p 3000:3000  -p 8080:8080   nginx:latest

### CONTAINERIZED APP
    - An application that runs inside a container.

### MANAGING  CONTAINERS
    - docker ps --help
    - docker ps --a

## START A CONTAINER
    -Start the Container  
        - docker start <containerId>
        - docker container start web
## STOP A CONTAINER
    - You can stop the ID or Actual Namme
    -Stop a Container
        - docker stop <containerId>
        - docker container stop <containerId>
        - docker container stop web

## REMOVE A CONTAINER
    -Removing Containers
        - docker ps -a show the list of running containers
        - docker rm <containerId>
        
    -Removing all containers
        - docker ps -aq
        - docker rm  $(docker ps -aq) 
            wont remove the running container
        - docker rm -f $(docker ps -aq) 
            will remove the running container
        - docker ps -a
    -You can have multiple container with different ID
    -Make sure the container doesn't run

### NAMING CONTAINERS
    - docker run -d -p 3000:80 - 8080:80 nginx:latest
    - make sure you stop the container before renaming

# RENAME CONTAINER
    -How to rename the container ?
        -docker rename <containerId> <newName>
        -docker rename zen_cray test

# NAME CONTAINER
    -Give the name of the container
        -$ docker run  --name website -d -p 3000:80 - 8080:80 nginx:latest
        -$ docker run -it --name test <containerId>  /bin/bash
        -#exit
        -$ docker ps -a
        -$ docker rm test test2
        -$ docker ps -a
        -$ docker images
        -$ docker rmi <imageId>
        -$ docker images
        -$ docker ps -a

## CHANGE/ MANIPULATE THE CONTAINER AND IMAGES
    -docker-machine active
    -docker images
        -docker pull ubuntu
        -docker images
    -Container 
        -docker run -it ubuntu
        -docker ps -a
        -docker stop <containerId> /bin/bash
             -# ls
             -# apt-get update
             -# apt-get install npm
             -#  npm -v
             -# exit
        -docker images
        -docker ps -a
        -docker commit <containerId> ubuntu-npm
        -docker images
        -docker ps -a
        -docker rm <containerId>
        -docker images
        -docker run it ubuntu-npm npm -v
        --docker rm <containerId>
    -docker ps -a  

## RUNNING A CONTAINER FROM AN  DOCKER HUB REGISTRY
    - clone the project as source code
    -Create an image from the source code
    -Push the image to the docker hub registry
    -Pull the image from the docker hub registry
    -Run the container from registry
    -docker container run -d --name web -p 8000:8000 company-crm-api

## DOCKER PS AND FORMATTING
    -docker ps
     "ID\t{{.ID}}\nNAME\t{{.Names}}\nIMAGE\t{{.Image}}\nPORTS\t{{.Ports}}\nCOMMAND\t{{.Command}}\nCREATED\t{{.CreatedAt}}\t{{.Status}}"      
    -docker ps --format="ID\t{{.ID}}\nNAME\t{{.Names}}\nIMAGE\t{{.Image}}\nPORTS\t{{.Ports}}\nCOMMAND\t{{.Command}}\nCREATED\t{{.CreatedAt}}\nSTATUS\t{{.Status}}\n" 
    - ~ export FORMAT=docker ps --format="ID\t{{.ID}}\nNAME\t{{.Names}}\nIMAGE\t{{.Image}}\nPORTS\t{{.Ports}}\nCOMMAND\t{{.Command}}\nCREATED\t{{.CreatedAt}}\nSTATUS\t{{.Status}}\n"
    - docker ps --format="$FORMAT"

### DOCKER  VOLUMES
    -Allows sharing of data . Files and Folders
    - Between HOST and CONTAINERS
    - Between CONTAINERS
     -Create a Volume in Container add the Files A , B which will appear in the HOST VS
     -Add the folder in HOST will appear in the Container VS    
    
##HOW TO SHARE DATA BETWEEN THE HOST AND CONTAINER
    - https://hub.docker.com/_/nginx
    - $ docker run --name some-nginx -v /some/content:/usr/share/nginx/html:ro -d nginx
    - $ docker run --name some-nginx -volume SOURCE:DESITINATION:READONLY VOLUME -d nginx
    - $ docker run --name website -d -p 8080:80 nginx

## VOLUMES BETWEEN HOST AND CONTAINERS
     - Create a folder called website 
     - Create  a index.html file in the folder (website )
     - cd ~/Desktop/website 
     - ~/Desktop/website  ls
     - ~website  docker run --name website -v $(pwd):/usr/share/nginx/html:ro  -d -p 8080:80 nginx  
      
## SHARE THE FILES WHICH ARE IN THE CONTAINER TO  APPEAR IN HOST
    - ~website  docker exec -it website  bash
    - root@8e75e3087039:/# -- inside the container
    - root@8e75e3087039:/# ls -al
    - root@8e75e3087039:/# cd /usr/share/nginx/html enter
    - root@8e75e3087039:/# cd /usr/share/nginx/html# ls -al
    - root@8e75e3087039:/# cd /usr/share/nginx/html# touch about.html
    - root@8e75e3087039:/# cd /usr/share/nginx/html#   CONTROL D
    - ->website docker ps
    - ->website docker rm -f website
    -  ~website  docker run --name website -v $(pwd):/usr/share/nginx/html  -d -p 8080:80 nginx  
    -  repeat the above process 
   
## CUSTOMIZE WEBSITE
    - Search on google bootsrap single page template 

### SHARING VOLUMES BETWEEN CONTAINERS
    -Container running on port 44
        -CREATE volume  FOLDER A , B 
    -Container running on port 80
        -FROM volume  FOLDER C , D   
    -Go to the folder website docker run --help
       -From running container
        ->webiste docker run --name website-copy --volumes-from  website -d -p 8081:80 nginx  enter
    -docker ps --format=$FORMAT
    - localhost:8080 and localhost:8081 

## DOCKERFILE
    - Docker can build images automatically by reading the instructions from a Dockerfile.
    - Dockerfile is a text file that describes how to build an image.
    - A Dockerfile is a text document that contains all the commands a user could call on the command line to assemble an image.   
    - Build our own Images  from the existing Images, 
    - We were building the Images and Running the Containers
         - IMAGE ----> RUN -------> CONTAINER
    - Dockerfile is a text file which is used to build the image
        Dockerfile --->CREATE---->IMAGE ---->RUN-------->CONTANER
    - https://docs.docker.com/engine/reference/builder/

### CREATING DOCKERFILE
     ->docker run --name website -v $(pwd):/usr/share/nginx/html  -d -p 8080:80 nginx  ENTER
     ->website ll
     ->website docker image ls
     ->website docker ps --format=$FORMAT

    # Create a custom image and run the container on it.
        - docker run --name website -v $(pwd):/usr/share/nginx/html  -d -p 8080:80 nginx
        - website Folder
             -css
             -img
             -js
             -vendor
             -Dockefile
                     FROM nginx:latest  
                     ADD . /usr/share/nginx/html/
             -gulpfile.js   
             -index.html
             -package.json
             -package-lock.json

## BUILDING IMAGES
    - Build an image from dockefile
      website la
      website docker build --help
      website docker build -t website:latest  . enter   
      website docker image ls
      website docker ps --format=$FORMAT
      website docker rm -f website
      website docker ps --format=$FORMAT  
      website docker ps -a
      website docker image ls
      website docker run --name website -d -p 8080:80 website:latest
      website docker ps
      localhost:8080

## NODE JS AND EXPRESS
    - install nodejs    
    - Expressjs.com 
    - mkdir user-service-api
    - cd user-service-api   
    - user-service-api    npm init
    - user-service-api    ll
    - user-service-api  
        - Dockerfile 
                FROM node:latest
                WORKDIR /app //INSIDE THE CONTAINER
                ADD . .    // ADD FROM LOCAL MACHINE INTO THE CONTAINER
                RUN  npm install
                CMD node index.js
       - user-service-api> docker build -t user-service-api:latest . Enter

### RUNNING NODEJS APP CONTAINERS
    -Run the container from the image we have build
    - user-service-api> docker image ls
    - user-service-api> docker run --name user-api -d -p 3000:3000 user-service-api:latest
    - user-service-api> docker ps
    - user-service-api> docker ps --format=$FORMAT
    - localhost:8080    

### .DOCKERIGNORE 
    - CREATE A FILE  .dockerignore ->node_modules Dockerfile .git  *.gulp.js folder/js
    -dockcer build -t user-service-api:latest . enter

### CACHING AND LAYERS
    -These five steps ,do create layer
         Dockerfile 
                FROM node:latest
                WORKDIR /app //INSIDE THE CONTAINER
                ADD . .    // ADD FROM LOCAL MACHINE INTO THE CONTAINER
                RUN  npm install
                CMD node index.js
         user-service-api>  npm i -S react webpack gulp grunt  
         user-service-api>  docker build -t user-service-api:latest . Enter  -build an image
         user-service-api>  docker run --name user-api -d -p 3000:3000 user-service-api:latest  
         user-service-api>  docker rm -f user-api 
         user-service-api>  docker run --name user-api -d -p 3000:3000 user-service-api:latest 
           Dockerfile 
                FROM node:latest
                WORKDIR /app //INSIDE THE CONTAINER
                ADD package*.json ./ //cache the package.json
                RUN  npm install
                ADD . .    // ADD FROM LOCAL MACHINE INTO THE CONTAINER
                CMD node index.js
         - docker build -t user-service-api:latest . Enter  -build an image
         - user-service-api>docker ps
         - user-service-api>docker rm -f user-api 
         - user-service-api>docker run --name user-api -d -p 3000:3000 user-service-api:latest 
         - localhost:3000
   
 ### ALPINE
    - doker image ls
    - SIZE 946MB 135MB  908MB  126MB 
    - The solution to reduce the size of the image is to use the alpine image.
    - Alpine Linux is built around musl libc and busybox. 
    - This makes it smaller and more resource efficient than traditional GNU/Linux distributions. 
    - A container requires no more than 8 MB and a minimal installation to disk requires around 130 MB of storage. 
    - https://alpinelinux.org/about/ will help to reduce the filesize of the image.

 ### PULLING ALPINE DOCKER IMAGES
    - docker pull node:lts-alpine
    - docker pull nginx:alpine
    - user-service-api>docker image ls
    
### SWITCHING TO ALPINE
    Dockerfile 
                FROM node:alpine    
                WORKDIR /app //INSIDE THE CONTAINER
                ADD . .    // ADD FROM LOCAL MACHINE INTO THE CONTAINER
                RUN  npm install
                CMD node index.js
    - user-service-api> docker image rm ID 
    - user-service-api> docker pull node:alpine
    - user-service-api> docker build -t user-service-api:latest . Enter

### TAGGING AND VERSIONING
    - Tags , Versioning and Tagging
    - Allows you to control image version
    - Avoids breaking changes
    - Safe - when build the images
    - EXAMPLE : docker pull nod:alpine  assuming Node 8
    - EXAMPLE : docker pull nod:alpine  assuming Node 12
    - EXAMPLE : docker pull node:latest  assuming Node 8
    - EXAMPLE : docker pull nod:latest  assuming Node 12
    -> You have control over the version of the image.
            - node:8-alpine
            - node:12-alpine
 
## USING TAGS  
        Dockerfile
        FROM node:10.16.1-alpine    
        WORKDIR /app //INSIDE THE CONTAINER
        ADD package*.json ./ //cache the package.json
        RUN  npm install
        ADD . .    // ADD FROM LOCAL MACHINE INTO THE CONTAINER
        CMD node index.js
        - Let us build the image AND run the containers

### RUNNING CONTAINERS USING TAGS
     > user-service-api> docker build -t user-service-api:latest . Enter    
     > user-service-api> docker image ps

### TAGGING OVERRIDE
        - user-service-api> docker image ls
        - we can <none>  which has no respository  and no tag
        -This happens when you have a local image with the same name as the image you are trying to pull.

### TAGGING IMAGES
    - docker build -t amigoscode-website:latest . Enter
    - docker image ls
    - docker tag amigoscode-website:latest amigoscode-website:1.0.0
    - docker image ls   
    - Both have the same content

###  RUNNING CONTAINER USING TAGS
    -docker ps
    - docker run --name amigoscode-latest -d -p 8000:80 amigoscode-website:latest
    - docker run --name amigoscode-2 -d -p 8081:80 amigoscode-website:2
    - docker run --name amigoscode-1 -d -p 8082:80 amigoscode-website:1

### DOCKER REGISTRIES
    - Is the computer server which stores the images.
    - Highly scalable server side appplication that stores and let you distribute Docker images.
    - So far we have been building images in our host machine.  
    - Now we want to store in our server side application.
    - We will use Docker registry.
    - Used in your CD/CI Pipeline - Spin up alot of image to archieve a certain task according to your  pipeline.
    - Run you applications :Take a container from the host machine and run it on the server side(docker registry).
      used to run the instance of the application.Example Running container, google cloud with kubernetes.Or
      some of services run with AWS.eg elastic bean stalk.
    - Docker Registry is a centralized server that stores and distributes Docker images.    
    - You have Host (IMAGE)  , ALSO you have Docker Registry (CONTAINER)
    - HOST(IMAGES)  --------> PUSH --------> DOKER REGISTRY

## TYPES OF DOCKER REGISTRIES
    - Public
    - Private

## REGISTRY PROVIDERS
    - Docker Hub
    - Quay.io
    - Amazon ECR

### DOCKER HUB
    -Let us push our images running from two application (website and api) push to docker registry.
    - we are going to use docker hub. hub.docker.com
    - docker hub gives us an ability to store public and private images.    
    - Click repostories tab on website ->create a new repository -> push the image to the repository.


### PUSHING IMAGES TO DOCKER HUB
    - Taking our images (HOST) and push to docker hub(Repository)   
    -  docker ps
    -  docker tag source : destination
    -  docker tag amigoscode-website:1 amigoscode/website:1   
    -  docker tag amigoscode-website:2 amigoscode/website:2   
    -  docker tag company-crm-api    amigoscode/api:1   
    -  docker ls
    -  Make sure you have logged in to docker hub. 
          - docker login
          - docker push amigoscode/website:1  press enter       
          - docker push amigoscode/api:1   press enter  


### PULLING IMAGES FROM DOCKER REGISTRY
    - We pushed our images to docker hub/container registry.    
    - Search your own username on docker hub   
    - docker pull amigoscode/website
    - docker image ls
    - docker rmi amigoscode/website:1
    - docker pull  amigoscode/website:1
    - docker image ls
    - run the container
    - docker run --name website -d -p 9000:80 amigoscode/website:1       

### DOCKER INSPECT CONTAINER
    - For debugging containers
    - docker ps --format=$FORMAT
    - docker inspect <container_id>/<NAME>

### DOCKER LOGS CONTAINER
    - debug the container
    - To see the logs/traffic  of the container  
    - docker logs <container_id>
    - docker logs -f <container_id> means follow the logs
    - docker ps
    - Learn more about docker logs  
        - docker logs --help

### BASH INTO THE CONTAINER    
    - If you want to go into the container/box, you can use the bash command.
    - docker ps
    - docker inspect <container_id>
    - docker exec --help
    - docker exec -it <container_id> /bin/bash press enter
    - Failed because we dont have bash installed in the container.
    - docker inspect <container_id>
    - search cmd in the container
        "cmd":[
            "/bin/sh",
            "-c",
            "apt-get update && apt-get install -y bash"
        ]
    -docker exec -it <container_id> /bin/sh  press enter
    -#ls -al
    -#pwd
    -# cd ..
     #ls -al

### docker image build ===> docker image push   ====> Registry
    -docker container run
    -docker container stop
    -docker container push



## CREATE VOLUMES
    - How to create volumes
        - $ docker-machine active   
        - $ docker images   
        - $ docker ps -a 
        - $ ls
        - $ mkdir data
        - $ cd data/
        - $ touch test.txt
        - $ ls
        - $ docker run it --name test1 -v source:/destination ubuntu bash  
        - $ docker run it --name test1 -v ~/docker-vid/data:/data ubuntu bash  
        - @8e75e3087039:/# ls data/
        - @8e75e3087039:/# exit
        - $ cd /data  
    - -V we use to bind the data from source : destination
        - docker inspect 
        - Creating a volumes
        - $ docker run it --name test2 -v data:/data ubuntu bash  
        - @8e75e3087039:/# ls data/
        - @8e75e3087039:/# exit
        - docker volumes ls
        - docker volumes  --help
        - docker volumes  --help
        - docker ps -a
        - docker volume ls
        - docker run it --name master -v backup:/backup  -v logs:logs ubuntu bash 
        -root@8e75e3087039:/# ls backup/    
        -root@8e75e3087039:/# ls logs/      
        -root@8e75e3087039:/# touch backup/bkp1.tar     
        -root@8e75e3087039:/# touch logs/temo.log     
        -root@8e75e3087039:/# exit 
        -$ docker volume ls 
    -Let mount all in one
        -$ docker run -it --name slave1 --volumes-from master  ubuntu bash  
        -root@8e75e3087039:/# ls
        -root@8e75e3087039:/# ls backup/
        -root@8e75e3087039:/# ls logs/
        -root@8e75e3087039:/# exit
        -$ docker ps -a
        -$ docker volume ls
        -$ docker volume inspect backup
        -$ docker volume inspect master



# DOCKER CONTAINER
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a 
    -$ docker pull ubuntu
    -$ docker images    
    -$ docker run -it  <ubuntuId> /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -$ docker ps -a
    -$ docker start <containerId>
    -$ docker ps -a
    -$ docker exec it <containeirId> /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -we dont have to use bash
    -$ docker exec -it <containerId> php -a
            -php > phpinfo.php
    -$ docker stop <containerId>    
    -$ docker restart <containerId>
    -$ docker ps -a

## DOCKER COMMAND
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a 
    -$ docker pull ubuntu
    -$ docker images
    -$ docker run it ubuntu /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -$ docker ps -a



# SINGLE COMMAND TO CREATE IMAGES / CONTAINER
        -$ docker run -it --name foobar ubuntu /bin/bash    
        -# exit   
        -$ docker images   
        -$ docker ps -a 

## FIND THE DOCKER IMAGES   FROM REGISTRY
    -WE CAN FIND THE DOCKER IMAGES BY NAME
    -$ docker images
    -$ docker ps -a
    -$ docker search ubuntu
    -$ docker search -s 5 ubuntu has more five stars
    -$ docker search -s 5 redis 
    -$ docker search -s 5 mysql 
    -$ docker search -s 5 --no-trunc
    -$ docker search --no-trunc specific image
    -$ docker ps -a | grep <imageId>
    -$ docker ps -a | grep <containerId>

 ##  CONTAINERS USERS
    - How to create a new user on container
        -$ docker-machine active
        -$ docker images
        -$ docker ps -a
        -$ docker run -it --name test ubuntu /bin/bash
        -root@8e75e3087039:/#  ls
        -root@8e75e3087039:/# 
    -Create a user 
        -root@8e75e3087039:/# adduser pete
        -root@8e75e3087039:/# cd /home/
        -root@8e75e3087039:/home# ls
        -root@8e75e3087039:/home# ls -al pete/
        -I can change the user to pete 
        -root@8e75e3087039:/home# su pete
        -pete@8e75e3087039:/home$ exit## DOCKER OBJECTIVES

    - What are containers
    - What is Docker?
    - why do you need it ?
    - What can it do ?
    - RUN docker and containers
    - Create a Docker image
    - Networks in Docker
    - Docker Compose
    - Docker Concepts in Depth
    - Docker for windows/Mac
    - Docker for Swarm
    -Docker vs Kubernetes  
    -Containers & Virtual Machines

    -Public docker registry - https://hub.docker.com/
    -Container vs Image 
    -Docker Image is Package Template Plan

##  START WITH DOCKER
    -Two types of docker
        -Community Edition (Linux , Mac , Windows ,)
        -Enterprise Edition

##  INSTALL DOCKER
        -docs.docker.com/install/
        -docker version

## IMAGES
    - What is an image ?
        - is the snapshot of a container
        - container is made from image
    - How to create an image ?  
    - How to create an image from a Dockerfile ?
    - How to create an image from a tar file ?

#IMAGES COMMANDS
    - -Please read the docs.docker.com/install/
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a
    -$ docker pull ubuntu
    -$ docker pull ubuntu:12.04
    -$ docker images
    -$ docker rmi <imageId> <imageId>
    -$ docker images
    -$ docker pull ubuntu:12.04

#CONTAINERS COMMANDS
    - List all containers
        - docker ps -a
    -Create a containers from Images
        - docker run --help
        - docker run -it ubuntu
        - docker run -it <ImageId> /bin/bash -WILL give you a shell
                - # ls
                - # cat /etc/apt/
                - # exit;
        - docker ps -a
    -Start the Container  
        - docker start <containerId>
        - docker stop <containerId>
    -Removing Containers
        - docker rm <containerId>
        - docker ps -a
    -Removing all containers
        - docker rm -f $(docker ps -a -q)
        - docker ps -a
    -You can have multiple container with different ID

## CHANGE/ MANIPULATE THE CONTAINER AND IMAGES
    -docker-machine active
    -docker images
        -docker pull ubuntu
        -docker images
    -Container 
        -docker run -it ubuntu
        -docker ps -a
        -docker stop <containerId> /bin/bash
             -# ls
             -# apt-get update
             -# apt-get install npm
             -#  npm -v
             -# exit
        -docker images
        -docker ps -a
        -docker commit <containerId> ubuntu-npm
        -docker images
        -docker ps -a
        -docker rm <containerId>
        -docker images
        -docker run it ubuntu-npm npm -v
        --docker rm <containerId>
    -docker ps -a   

# DOCKER CONTAINER
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a 
    -$ docker pull ubuntu
    -$ docker images    
    -$ docker run -it  <ubuntuId> /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -$ docker ps -a
    -$ docker start <containerId>
    -$ docker ps -a
    -$ docker exec it <containeirId> /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -we dont have to use bash
    -$ docker exec -it <containerId> php -a
            -php > phpinfo.php
    -$ docker stop <containerId>    
    -$ docker restart <containerId>
    -$ docker ps -a

## DOCKER COMMAND
    -$ docker-machine active
    -$ docker images
    -$ docker ps -a 
    -$ docker pull ubuntu
    -$ docker images
    -$ docker run it ubuntu /bin/bash
        -# ls
        -# apt-get update
        -# apt-get install php
        -#  php -v
        -# exit
    -$ docker ps -a
# RENAME CONTAINER
    -How to rename the container ?
        -docker rename <containerId> <newName>
        -docker rename zen_cray test

# NAME CONTAINER
    -Give the name of the container
        -$ docker run -it --name test <containerId>  /bin/bash
        -#exit
        -$ docker ps -a
        -$ docker rm test test2
        -$ docker ps -a
        -$ docker images
        -$ docker rmi <imageId>
        -$ docker images
        -$ docker ps -a

# SINGLE COMMAND TO CREATE IMAGES / CONTAINER
        -$ docker run -it --name foobar ubuntu /bin/bash    
        -# exit   
        -$ docker images   
        -$ docker ps -a 

## FIND THE DOCKER IMAGES   FROM REGISTRY
    -WE CAN FIND THE DOCKER IMAGES BY NAME
    -$ docker images
    -$ docker ps -a
    -$ docker search ubuntu
    -$ docker search -s 5 ubuntu has more five stars
    -$ docker search -s 5 redis 
    -$ docker search -s 5 mysql 
    -$ docker search -s 5 --no-trunc
    -$ docker search --no-trunc specific image
    -$ docker ps -a | grep <imageId>
    -$ docker ps -a | grep <containerId>

##  CONTAINERS USERS
    - How to create a new user on container
        -$ docker-machine active
        -$ docker images
        -$ docker ps -a
        -$ docker run -it --name test ubuntu /bin/bash
        -root@8e75e3087039:/#  ls
        -root@8e75e3087039:/# 
    -Create a user 
        -root@8e75e3087039:/# adduser pete
        -root@8e75e3087039:/# cd /home/
        -root@8e75e3087039:/home# ls
        -root@8e75e3087039:/home# ls -al pete/
        -I can change the user to pete 
        -root@8e75e3087039:/home# su pete
        -pete@8e75e3087039:/home$ exit
        -root@8e75e3087039:/home# exit
        -$ docker ps -a
        -$ docker start test    
        -$ docker ps -a
        -$ docker exec -it test /bin/bash
        -root@8e75e3087039:/#
    -But I to execute the command to a different user
        -$ docker exec -it -u pete test /bin/bash   
        -pete@8e75e3087039:/$ ls  
        -pete@8e75e3087039:/$ pwd  
        -pete@8e75e3087039:/~$ cd ~/
        -pete@8e75e3087039:/~$ pwd
        -pete@8e75e3087039:/~$
        
## copy containers files
    -copy and paste from host machine to container
        - $ docker-machine active   
        - $ docker images   
        - $ docker ps -a   
        - $ docker run -it --name test1 ubuntu /bin/bash 
        - root@8e75e3087039:/# ls
        - root@8e75e3087039:/# touch test.txt
        - root@8e75e3087039:/# ls
        - root@8e75e3087039:/# exit
        - $ ls  no file exits
    - To put a file from container and put into host machine
        -$ docker cp test1:/test.txt .
        -$ ls
        -$ mv test.txt test1.txt
        -$ ls
    - Move the file from host machine into container
        -$ docker cp ./test1.txt test1:/
        -$ docker cp ./test1.txt test1:/
        -$ docker ps -a 
        -$ docker start test1   
        -$ docker exec -it test1 /bin/bash      
        -root@8e75e3087039:/#  ls    

## CONTAINER PORTS
     - $ docker-machine active   
     - $ docker images   
     - $ docker ps -a 
     - $ docker run --help
     - $ docker run -td --name webserver -p 80:80 ubuntu   container:host port
     - $ docker por webserver  
     - We need to install the apache2
        - $ docker exec -it webserver /bin/bash
        - root@8e75e3087039:/#  apt-get update
        - root@8e75e3087039:/#  apt-get install apache2 vim 
        - root@8e75e3087039:/# cd /etc/apache2/
        - root@8e75e3087039: /etc/apache2# ls
        - root@8e75e3087039: /etc/apache2# cat sites-enabled/000-default.conf
        - root@8e75e3087039: /etc/apache2# cd  /var/www/html/
        - root@8e75e3087039: /var/www/html# ls
        - root@8e75e3087039: /var/www/html# cat index.html
        - root@8e75e3087039: /var/www/html# clear
        - root@8e75e3087039: /var/www/html# service apache2 restart
        - root@8e75e3087039: /var/www/html# exit from container
        - $ docker ps
        - $ docker-machine ip howtocodwell
        - $ curl http://howtocodwell:80
     - Let go back to bash
        -docker exec -it webserver /bin/bash
        -root@8e75e3087039:/# cd /var/www/html/
        -root@8e75e3087039: /var/www/html# rm index.html
        -root@8e75e3087039: /var/www/html# ls
        -root@8e75e3087039: /var/www/html# vi test.index.html
        -root@8e75e3087039: /var/www/html# exit
        -$ docker ps
        -$ docker stop webserver
        -$ docker start webserver
    -Create a script for apache server to run
        -$ docker exec -it webserver /bin/bash
        -root@8e75e3087039:/# service apach2 restart

## CONTAINER HOSTNAME
    - how to identify the container
         - $ docker-machine active   
         - $ docker images   
         - $ docker ps -a
         - $ docker run it ubuntu bash
         -root@8e75e3087039:/# exit remember @8e75e3087039 is container id
         -root@8e75e3087039:/# exit
         - $ docker run it ubuntu bash
         -root@8e75e3087045:/# exit remember @8e75e3087039 is container id
         -root@8e75e3087045:/# exit 
        - $ docker run it ubuntu bash
         -root@8e75e308345:/# exit remember @8e75e3087039 is container id
         -root@8e75e308345:/# exit 
    - each of one has different container id
    - Its easier to change the name when your outside the container
    - But if your inside the container you can't change the name ,hard to remember if u run many containers 
        -$ docker ps -a  
    -The solution is to change the hostname of the container
        -docker run -it -h test.local ubuntu /bin/bash
        -root@test:/# cat /etc/hosts
        -root@test:/# exit
        -$ docker ps 
        -$ docker ps -a 
        -$ docker start <containerId> 
        -$ docker docker exec -t  <containerId>  bash
        -root@test:/# 

## DOCKER CONTAINER ENV VARIABLES
    -How to set environment variables 
    -Happened when we run the container
        - $ docker-machine active   
        - $ docker images   
        - $ docker ps -a 
        - $ docker run --help
        - $ docker run -it -e MODE=test ubuntu bash  
        - root@8e75e3087039:/# echo $MODE
        - root@8e75e3087039:/# exit
        - $ docker run -it -e MODE=test -e DOC_ROOT=/var/www  ubuntu bash  
        - root@8e75e3087039:/# echo $MODE
        - root@8e75e3087039:/# echo DOC_ROOT
        - root@8e75e3087039:/# exit
        - $ ls
        - $ vi env.ist
        - $ docker run -it --env-file ./env.list  ubuntu bash  
        - $ docker run -it --env-file ./env.list  -e MODE=dev ubuntu bash 
        -  root@8e75e3087039:/#  echo $MODE
        -  root@8e75e3087039:/#  exit
        - $ docker run -it -e MODE=dev --env-file ./env.list   ubuntu bash  


       






# DOCKER COMMAND
    -Please read the docs.docker.com/install/
    -Run - Start a container
    - docker run nginx
    -PS - List all running containers
    - docker ps
    -PS -a - List all containers
    - docker ps -a
    -Stop - Stop a container
    - docker stop <container_id>
    -RM - Remove a container
    - docker rm <container_id>
    -images  -  List all images
    - docker images
    -rmi - Remove an image
    - docker rmi <image_id>
     -pull - Pull an image from a registry
    - docker pull <image_name> 
    -push - Push an image to a registry
    - docker push <image_name>

## APPEND A COMMAND
- docker run ubuntu
- docker run ubuntu sleep 5

# Execute a command in a running container
-Execute a command in a running container
- docker exec -it <container_id> <command>
- docker exec distracted_mcclintock cat /etc/hosts
  -Run-attache and detach
- docker run -it <container_id> <command>
- docker run -d
- docker attach <container_id>

## LABS
    -kodekloud.com/p/docker-labs
    -Run -tag
    -docker run redis:4.0.10

Run -STDIN
.app.sh
- docker run -i kodekloud/simmple-prompt-docker
    - docker run -it kodekloud/simmple-prompt-docker
      Run -port mapping
      docker run kodekloud/webapp
    - docker run -p 80:5000 kodekloud/simple-webapp
    - docker run -p 8000:5000 kodekloud/simple-webapp
    - docker run -p 8001:5000 kodekloud/simple-webapp
    - docker run -p 3306:3306 mysql
    - docker run -p 8306:3306 mysql
    - docker run -p 8307:3306 mysql

# RUN - Volume mapping
- docker run mysql
    - data are stored in /var/lib/mysql
    - docker stop mysql
    - docker rm mysql
        - create a directory
        - docker run -v /opt/datadir:/var/lib/mysql mysql
        -
# INSPECT CONTAINER
     docker inspect <container_id>
# CONTAINER LOGS
     docker logs <container_id>

# DOCKER ENVIRONMENT VARIABLES
- docker run e APP_COLOR=blue simple-webapp-color
- docker run e APP_COLOR=red simple-webapp-color

#INSPECT ENVIRONMENT VARIABLES
- docker inspect <container_id>

## DOCKER NETWORKING
# DEFAULT NETWORKS
     - Bridge 
        - docker run ubuntu
     - None
        - docker run ubuntu  --network=none
     - Host
        - docker run ubuntu --network=host
# User defined networks
     - docker network create --driver bridge --subnet 182.18.0.0/16 custom-isolated-network
     - docker network create --driver bridge my-network
     - docker run --network=my-network ubuntu
     - docker network ls
     - docker network rm my-network

# INSPECT NETWORK
     - docker network inspect my-network
     - docker inspect <container_id>

#EMBEDDED DNS
     - docker run -d --name=dns-server --network=host dnsmasq
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts --no-resolv
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts --no-resolv --server=

## DOCKER STORAGE
# File System - How docker stores data
    -/var/lib/docker
        -aufs
        -containers
        -images
        -volumes
           - docker volume create data_volume
           - docker volume ls        
                   - /var/lib/docker
                         - /volumes
                                - data_volume
    -docker run -v data_volume:/var/lib/mysql mysql     
    - this code above will mount the data_volume to /var/lib/mysql into the container
    - docker run -v /data/mysql:/var/lib/mysql mysql
    -Two types of mounting
     -Bind Mount
        -docker run -v /data/mysql:/var/lib/mysql mysql
     -Volume Mount
        -docker run -v data_volume:/var/lib/mysql mysql
# Better way to mount
    - docker run --mount type=bind,source=/data/mysql,target=/var/lib/mysql mysql

# STORAGE DRIVERS
    -  aufs
    -  overlay
    -  overlay2
    - btrfs
    - devicemapper      
    - zfs

## DOCKER COMPOSE
     - docker-compose.yaml file
     - docker-compose up

# Docker Run
    - docker run -d --name=redis redis
    - docker run -d --name=db postgres:9.6 result-app
    - docker run -d --name=vote -p 5000:80 voting-app
    - docker run -d --name=result -p 5001:80 
    - docker run -d --name=worker worker

    - Try to access 192.16.56.101:5000  you get a 404I  internal server error
    - Links allows to connect containers to each other
        - docker run --links
        
     - docker run -d --name=redis redis
    - docker run -d --name=db postgres:9.6 --link db:db result-app
    - docker run -d --name=vote -p 5000:80 --link redis:redis  voting-app
    - docker run -d --name=result -p 5001:80 
    - docker run -d --name=worker --link db:db  --link redis:redis  worker

# From above, we can create a docker-compose.yml file
    - version: '2'
    - services:
        - redis:
            image: redis:alpine
            container_name: redis
            ports:
                - "6379:6379"
        - db:
            image: postgres:9.6
            container_name: db
            ports:
                - "5432:5432"
        - vote:
            image: voting-app
            container_name: vote
            ports:
                - "5000:80"
            links:
                - db:db
                - redis:redis
        - result:
            image: result-app
            container_name: result
            ports:
                - "5001:80"
        - worker:
            image: worker
            container_name: worker
            ports:
                - "8080:80"
            links:
                - db:db
                - redis:redis
    networks:
        - front-end
        - back-end  

    - docker-compose up to run the application stack

# Docker compose - Build
    - docker-compose build

# Docker compose - versions
    - search in google in version 1.x   , 2.x in version 2 .x you dont have to provide the links
    - version 3 .x is the same as 2.x    although you can add swarm mode


## DOCKER REGISTRY
    - What is registry ? is where the all images are stored .eg grc.io ,kubernetes.io
    -Container in a RAM
    -Image
         -docker run ngnix
                - image:nginx  
                -ingix is the Image/Repository name
                -- image:nginx/nginx   User/Account(Name of Account or Name of Organization)  Image/Repository name
    - Docker Hub / docker.io
      image: docker.io/nginx/nginx  
            -docker.io Registry
            -nginx/  User/Account
            -nginx/nginx Image/Repository name
## Types of Registry
    - Private Registry ,aws ,gcp
        - docker login private-registry.io
        - docker run private-registry.io/apps/internal-app
        - docker push
        - docker pull

## Deploy Private  Registry

    - docker run -d --name=nginx -p 5000:5000 registry registry:2
    - docker image tag my-image localhost:5000/my-image
    - docker push  localhost:5000/my-image
    - docker pull  localhost:5000/my-image
    - docker pull  192.168.1.1:5000/my-image

# DOCKER ENGINE
    - is the software that runs the containers/hosts docker installed
    - When you installed docker engine, you installed the following
            - Docker CLI is the command line interface to the Docker Engine
            - REST API    is the API that allows you to interact with the docker engine
                    - You can run on different machines and communicate with each other
                    - docker -H=remote-docker-engine:2375
                    - docker -H=10.123.2.1:2375 run nginx
            - Docker Deamon is the background process that runs the docker engine, images,containers,networks,volumes

# CONTAINERIZATION
    - Containerization is the process of turning a software application into a container
    -Docker use the namespace to isolate 
        -ProcessID - unique ID for each container
        -Network
        -Mount
        -InterProcess
        -Unix Timesharing
        -Cgroups  to restrict the resources docker run --cpu=.5 ubuntu
        -Cgroups  to restrict the resources docker run --memory=100m ubuntu

## DOCKER WINDOWS
    - Docker Tools box 
        - Oracle VirtualBox
        - Docker Engine
        - Docker Machine
        - Docker Compose
        - Kitematic    GUI

    - Docker Destop for Windows
       - Microsoft Hyper-V 
# Windows Containers
    - Windows Server
    - Hyper-V Isolation

## DOCKER ON MAC
    - Two types of containers
        - Docker on Mac using Docker Toolbox
            - Oracle VirtualBox
            - Docker Engine
            - Docker Machine
            - Docker Compose
            - Kitematic    GUI
            - Docker Desktop for Mac 
        - Docker Desktop for Docker 
             - Use HyperKit Technology
        -To run Linux container on Mac
# ORCHESTRATE
    - Why Orchestrate ? 
    - Container Orchestration 
    - docker service create --replicas=3 nodejs run on manager
# SOLUTIONS
        - Docker Swarm
        - Kubernetes GOOGLE
        - Mesos

## Docker SWARM
    - Docker Swarm is a distributed system that allows you to run multiple containers on multiple machines
        -swarm Manager

## Docker KUBERNETES
    - Docker KUBERNETES is a distributed system that allows you to run multiple containers on multiple machines
        -kubetcl scale --replicas=2000 nginx
        -kubetcl run --replicas=2000 my-webserver
        -kubetcl scale --replicas=2000 my-webserver 
        -kubetcl rolling-update my-web-server --image=web-server:2





















## What will you learn about Docker
- How to deploy PHP Apps Using Docker Compose
- Build a test a local development environment
- Build a production environment from the development version
- Build and tag self-contained Docker images
- Push the Docker images to a Docker image registry
- Test the production deployment
- Deploy to production

## The Docker Architecture
- Docker uses a client -server architecture
- The Docker client talks to the Docker deamon.
- The Docker client and Docker deamon can run on the same machine or on different machines.
- The Docker client and Docker deamon communicate using a REST API over UNIX sockets or a network interface.
- The Docker client and Docker deamon communicate using a REST API over TCP/IP.

## Why Deploy PHP Apps Using Docker Compose
- Can be a simpler way to deploy a PHP app
- Use unified commands
- Deploy to production like development
- Easily share steps
- integrate with other tools CI/CD

# What do you need?
- A broad familiarity with the Docker client and Docker deamon
- Docker Engine on Linux
- Docker Desktop on Windows and MacOs
- Docker Compose V2
- A Docker image registry
- A deployment server running Docker

## DEMO APPLICATION COMPOSITION
- We will need three tools:
    - PHP 8.0
    - Web Server NGINX
    - Database MySQL
    - This composition follow "One process or service per container "

## CREATE THE DEVELOPMENT CONFIGURATION
-docker
-development(directory)
----nginx(services)
----default.conf
----Dockerfile

        -----php(services)
                --DockerFile

    -production(directory)
        ----database(services)
                    ----default.conf
                     ----Dockerfile
   
        
            
        ----nginx(services)
                    ----default.conf
                    ----Dockerfile
        -----php(services)
             --DockerFile

-docker-compose.prod.yml
-docker-compose.dev.yml

## CREATE A DOCKERFILE NGINX FOR THE PHP APPLICATION
FROM nginx:alpine    
COPY ./docker/production/nginx/default.conf \
/etc/nginx/conf.d/default.conf

## CREATE A DOCKERFILE DATABASE FOR THE PHP APPLICATION
FROM mariadb:latest
COPY ./docker/production/database/dump.sql \
/docker-entrypoint-initdb.d/dump.sql

## Deploy the Application Locally
-docker compose \
-file docker-compose.dev.yml  up\
--build -d

## DOcker Pull
- docker pull nginx:alpine
- docker pull mariadb:latest
- docker pull php:8.0.13-fpm-alpine3.14

##Are the Containers working as Expected?
# Docker Compose ps
    -docker compose -f docker-compose.dev.yml ps
    -docker compose -f docker-compose.dev.yml ps database
# Docker Compose logs
    -docker compose \
    -f docker-compose.dev.yml logs \
     --follow database

## CREATE THE PRODUCTION CONFIGURATION

## DOCKER IMAGES
- docker images
## FILTER DOCKER IMAGES
-docker images --filter=reference='registry*/*/*:latest'     
-docker images --filter=reference=php:8.0.13-fpm-alpine3.14

## PUSH THE DOCKER IMAGES
- docker login --username <username> --password <password> --email <email>
- docker push webdevwithmatt/webserver-alpine:latest
- docker push webdevwithmatt/php-runtime-alpine:latest
- docker push webdevwithmatt/database-alpine:latest

## WHAT ABOUT A BUILD PIPELINE?
- Github Actions
- Travis CI
- Circleci
- Read https://dockeressentials.com/



# DOCKER COMMAND
    -Please read the docs.docker.com/install/
    -Run - Start a container
    - docker run nginx
    -PS - List all running containers
    - docker ps
    -PS -a - List all containers
    - docker ps -a
    -Stop - Stop a container
    - docker stop <container_id>
    -RM - Remove a container
    - docker rm <container_id>
    -images  -  List all images
    - docker images
    -rmi - Remove an image
    - docker rmi <image_id>
     -pull - Pull an image from a registry
    - docker pull <image_name> 
    -push - Push an image to a registry
    - docker push <image_name>

## APPEND A COMMAND
- docker run ubuntu 
- docker run ubuntu sleep 5

# Execute a command in a running container
 -Execute a command in a running container
  - docker exec -it <container_id> <command>
  - docker exec distracted_mcclintock cat /etc/hosts
-Run-attache and detach
  - docker run -it <container_id> <command>
  - docker run -d
  - docker attach <container_id>

## LABS
    -kodekloud.com/p/docker-labs
    -Run -tag
    -docker run redis:4.0.10

Run -STDIN
 .app.sh
 - docker run -i kodekloud/simmple-prompt-docker
   - docker run -it kodekloud/simmple-prompt-docker
Run -port mapping
   docker run kodekloud/webapp
   - docker run -p 80:5000 kodekloud/simple-webapp
   - docker run -p 8000:5000 kodekloud/simple-webapp
   - docker run -p 8001:5000 kodekloud/simple-webapp
   - docker run -p 3306:3306 mysql
   - docker run -p 8306:3306 mysql
   - docker run -p 8307:3306 mysql

# RUN - Volume mapping
 - docker run mysql
   - data are stored in /var/lib/mysql
   - docker stop mysql
   - docker rm mysql
     - create a directory
     - docker run -v /opt/datadir:/var/lib/mysql mysql
     - 
 # INSPECT CONTAINER
     docker inspect <container_id>
# CONTAINER LOGS
     docker logs <container_id>

# DOCKER ENVIRONMENT VARIABLES
- docker run e APP_COLOR=blue simple-webapp-color
- docker run e APP_COLOR=red simple-webapp-color

#INSPECT ENVIRONMENT VARIABLES
- docker inspect <container_id>

## DOCKER NETWORKING
# DEFAULT NETWORKS
     - Bridge 
        - docker run ubuntu
     - None
        - docker run ubuntu  --network=none
     - Host
        - docker run ubuntu --network=host
# User defined networks
     - docker network create --driver bridge --subnet 182.18.0.0/16 custom-isolated-network
     - docker network create --driver bridge my-network
     - docker run --network=my-network ubuntu
     - docker network ls
     - docker network rm my-network

# INSPECT NETWORK
     - docker network inspect my-network
     - docker inspect <container_id>

#EMBEDDED DNS
     - docker run -d --name=dns-server --network=host dnsmasq
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts --no-resolv
     - docker run -d --name=dns-server --network=host dnsmasq --no-hosts --no-resolv --server=

## DOCKER STORAGE
  # File System - How docker stores data
    -/var/lib/docker
        -aufs
        -containers
        -images
        -volumes
           - docker volume create data_volume
           - docker volume ls        
                   - /var/lib/docker
                         - /volumes
                                - data_volume
    -docker run -v data_volume:/var/lib/mysql mysql     
    - this code above will mount the data_volume to /var/lib/mysql into the container
    - docker run -v /data/mysql:/var/lib/mysql mysql
    -Two types of mounting
     -Bind Mount
        -docker run -v /data/mysql:/var/lib/mysql mysql
     -Volume Mount
        -docker run -v data_volume:/var/lib/mysql mysql
# Better way to mount
    - docker run --mount type=bind,source=/data/mysql,target=/var/lib/mysql mysql

# STORAGE DRIVERS
    -  aufs
    -  overlay
    -  overlay2
    - btrfs
    - devicemapper      
    - zfs

## DOCKER COMPOSE
     - docker-compose.yaml file
     - docker-compose up

# Docker Run
    - docker run -d --name=redis redis
    - docker run -d --name=db postgres:9.6 result-app
    - docker run -d --name=vote -p 5000:80 voting-app
    - docker run -d --name=result -p 5001:80 
    - docker run -d --name=worker worker

    - Try to access 192.16.56.101:5000  you get a 404I  internal server error
    - Links allows to connect containers to each other
        - docker run --links
        
     - docker run -d --name=redis redis
    - docker run -d --name=db postgres:9.6 --link db:db result-app
    - docker run -d --name=vote -p 5000:80 --link redis:redis  voting-app
    - docker run -d --name=result -p 5001:80 
    - docker run -d --name=worker --link db:db  --link redis:redis  worker

# From above, we can create a docker-compose.yml file
    - version: '2'
    - services:
        - redis:
            image: redis:alpine
            container_name: redis
            ports:
                - "6379:6379"
        - db:
            image: postgres:9.6
            container_name: db
            ports:
                - "5432:5432"
        - vote:
            image: voting-app
            container_name: vote
            ports:
                - "5000:80"
            links:
                - db:db
                - redis:redis
        - result:
            image: result-app
            container_name: result
            ports:
                - "5001:80"
        - worker:
            image: worker
            container_name: worker
            ports:
                - "8080:80"
            links:
                - db:db
                - redis:redis
    networks:
        - front-end
        - back-end  

    - docker-compose up to run the application stack

# Docker compose - Build
    - docker-compose build

# Docker compose - versions
    - search in google in version 1.x   , 2.x in version 2 .x you dont have to provide the links
    - version 3 .x is the same as 2.x    although you can add swarm mode


## DOCKER REGISTRY
    - What is registry ? is where the all images are stored .eg grc.io ,kubernetes.io
    -Container in a RAM
    -Image
         -docker run ngnix
                - image:nginx  
                -ingix is the Image/Repository name
                -- image:nginx/nginx   User/Account(Name of Account or Name of Organization)  Image/Repository name
    - Docker Hub / docker.io
      image: docker.io/nginx/nginx  
            -docker.io Registry
            -nginx/  User/Account
            -nginx/nginx Image/Repository name
## Types of Registry
    - Private Registry ,aws ,gcp
        - docker login private-registry.io
        - docker run private-registry.io/apps/internal-app
        - docker push
        - docker pull

## Deploy Private  Registry

    - docker run -d --name=nginx -p 5000:5000 registry registry:2
    - docker image tag my-image localhost:5000/my-image
    - docker push  localhost:5000/my-image
    - docker pull  localhost:5000/my-image
    - docker pull  192.168.1.1:5000/my-image

# DOCKER ENGINE
    - is the software that runs the containers/hosts docker installed
    - When you installed docker engine, you installed the following
            - Docker CLI is the command line interface to the Docker Engine
            - REST API    is the API that allows you to interact with the docker engine
                    - You can run on different machines and communicate with each other
                    - docker -H=remote-docker-engine:2375
                    - docker -H=10.123.2.1:2375 run nginx
            - Docker Deamon is the background process that runs the docker engine, images,containers,networks,volumes

# CONTAINERIZATION
    - Containerization is the process of turning a software application into a container
    -Docker use the namespace to isolate 
        -ProcessID - unique ID for each container
        -Network
        -Mount
        -InterProcess
        -Unix Timesharing
        -Cgroups  to restrict the resources docker run --cpu=.5 ubuntu
        -Cgroups  to restrict the resources docker run --memory=100m ubuntu

## DOCKER WINDOWS
    - Docker Tools box 
        - Oracle VirtualBox
        - Docker Engine
        - Docker Machine
        - Docker Compose
        - Kitematic    GUI

    - Docker Destop for Windows
       - Microsoft Hyper-V 
# Windows Containers
    - Windows Server
    - Hyper-V Isolation

## DOCKER ON MAC
    - Two types of containers
        - Docker on Mac using Docker Toolbox
            - Oracle VirtualBox
            - Docker Engine
            - Docker Machine
            - Docker Compose
            - Kitematic    GUI
            - Docker Desktop for Mac 
        - Docker Desktop for Docker 
             - Use HyperKit Technology
        -To run Linux container on Mac
# ORCHESTRATE
    - Why Orchestrate ? 
    - Container Orchestration 
    - docker service create --replicas=3 nodejs run on manager
# SOLUTIONS 
        - Docker Swarm
        - Kubernetes GOOGLE
        - Mesos
   
## Docker SWARM
    - Docker Swarm is a distributed system that allows you to run multiple containers on multiple machines
        -swarm Manager

## Docker KUBERNETES
    - Docker KUBERNETES is a distributed system that allows you to run multiple containers on multiple machines
        -kubetcl scale --replicas=2000 nginx
        -kubetcl run --replicas=2000 my-webserver
        -kubetcl scale --replicas=2000 my-webserver 
        -kubetcl rolling-update my-web-server --image=web-server:2





















## What will you learn about Docker
- How to deploy PHP Apps Using Docker Compose
- Build a test a local development environment
- Build a production environment from the development version
- Build and tag self-contained Docker images
- Push the Docker images to a Docker image registry
- Test the production deployment
- Deploy to production

## The Docker Architecture
- Docker uses a client -server architecture
- The Docker client talks to the Docker deamon.
- The Docker client and Docker deamon can run on the same machine or on different machines.
- The Docker client and Docker deamon communicate using a REST API over UNIX sockets or a network interface.
- The Docker client and Docker deamon communicate using a REST API over TCP/IP.

## Why Deploy PHP Apps Using Docker Compose
- Can be a simpler way to deploy a PHP app
- Use unified commands
- Deploy to production like development
- Easily share steps
- integrate with other tools CI/CD

# What do you need?
- A broad familiarity with the Docker client and Docker deamon
- Docker Engine on Linux
- Docker Desktop on Windows and MacOs
- Docker Compose V2
- A Docker image registry
- A deployment server running Docker

## DEMO APPLICATION COMPOSITION
- We will need three tools:
  - PHP 8.0
  - Web Server NGINX
  - Database MySQL
  - This composition follow "One process or service per container "

## CREATE THE DEVELOPMENT CONFIGURATION
-docker
    -development(directory)
        ----nginx(services)
                    ----default.conf
                    ----Dockerfile
   
        -----php(services)
                --DockerFile

    -production(directory)
        ----database(services)
                    ----default.conf
                     ----Dockerfile
   
        
            
        ----nginx(services)
                    ----default.conf
                    ----Dockerfile
        -----php(services)
             --DockerFile

-docker-compose.prod.yml
-docker-compose.dev.yml

## CREATE A DOCKERFILE NGINX FOR THE PHP APPLICATION
FROM nginx:alpine    
COPY ./docker/production/nginx/default.conf \
        /etc/nginx/conf.d/default.conf

## CREATE A DOCKERFILE DATABASE FOR THE PHP APPLICATION
FROM mariadb:latest
COPY ./docker/production/database/dump.sql \
        /docker-entrypoint-initdb.d/dump.sql 

## Deploy the Application Locally
-docker compose \
    -file docker-compose.dev.yml  up\
    --build -d

## DOcker Pull
- docker pull nginx:alpine
- docker pull mariadb:latest
- docker pull php:8.0.13-fpm-alpine3.14

##Are the Containers working as Expected?
# Docker Compose ps
    -docker compose -f docker-compose.dev.yml ps
    -docker compose -f docker-compose.dev.yml ps database
# Docker Compose logs
    -docker compose \
    -f docker-compose.dev.yml logs \
     --follow database

## CREATE THE PRODUCTION CONFIGURATION

## DOCKER IMAGES
    -docker images  
## FILTER DOCKER IMAGES
    -docker images --filter=reference='registry*/*/*:latest'     
    -docker images --filter=reference=php:8.0.13-fpm-alpine3.14     

## PUSH THE DOCKER IMAGES
    -docker login --username <username> --password <password> --email <email>
    -docker push webdevwithmatt/webserver-alpine:latest
    -docker push webdevwithmatt/php-runtime-alpine:latest
    -docker push webdevwithmatt/database-alpine:latest

## WHAT ABOUT A BUILD PIPELINE?
  - Github Actions
  - Travis CI
  - Circleci
  - Read https://dockeressentials.com/

## CLOUD-NATIVE MICROSERVICES

### DOCKER SWARM    
    ## Secure Swarm Cluster
        - Manager
        - Worker
        - docker swarm init --advertise-addr = 192.168.0.20


#Microservices and Docker Services
    - docker service create --name we -p 8080:8080  --replicas 2 webdevwithmatt/webserver-alpine:latest 
    - docker service ls
    - docker container ls
    - docker service ps web
    - docker service scale web=10
        -https://labs.play-with-docker.com/
