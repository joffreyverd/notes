# Docker

```sh

# authentication with existing credentials to a remote registry
docker login <registryAdress>

docker run <image> # docker create then docker run
# alternativly
docker create <image>
docker start -a <imageId>

# stoping the running process
docker stop <imageId> # SIGTERM
# kill the runing process
docker kill <imageId> # SIGKILL

# list of all the running containers
docker ps

# list of all the containers
docker ps -a
# list of all containers with essential informations
docker ps -a --format 'table {{.Names}}\t{{.Image}}\t{{.Status}}'

# execute a command inside the given container
docker exec -it <containerId> <command>
# execute a new shell directly from the container
docker exec -it <containerName> sh

# create a docker image from the right repository
docker build -t joffreyverd/redis:latest .
# then run the docker container
docker run joffreyverd/redis

# create and start all containers
docker-compose up

# create and start all containers in free
docker-compose up -d

# restart a specific container
docker restart <containerName>

# delete a specific container
docker rm <containerName>

# delete all containers
docker rm (docker ps -aq)

# delete an image
docker rmi <imageId>

# list of all containers's id and stop everyone clearly
docker stop (docker ps -q)

# know error of one container
docker logs <dockerContainerName>

# delete the web and data containers
docker-compose rm web data

# delete all containers and clean it
docker volume rm (docker volume ls -q)

# list all volumes (which are used by the containers)
docker volume ls

# delete specified volume
docker volume rm <Name>
# delete all volumes are not used
docker volume rm (docker volume ls --filter dangling=true -q)

# build a new image
docker build -t <serviceName> -f Dockerfile .

# pull from registry a specific image
docker pull <registryAdress>/<image>:<tag>

# clean containers, volumes, images
docker system prune

# get the occupation of containers
docker system df

# create a new docker container containing database
docker run --name maria -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_DATABASE=perso -p 3306:3306 -d mariadb:10.2

## ------------------- Create a new docker image
# build and tag (latest by default) the new image
docker build -t <serviceName> .
# or build an image with specific conf
docker build -t <serviceName> -f <confPath> .
# tag the image
docker tag <serviceName> <completeRegistryAdress>:<image>
# push on the remote registry the new image
docker push <completeRegistryAdress>:<image>
# pull the new image from the remote registry
docker pull <completeRegistryAdress>:<image>
```
