## DOCKER OBJECTIVES
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

## DOCKER VOLUMES
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
