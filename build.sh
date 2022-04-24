#!/bin/bash

# change these
DOCKERNAME=cbjs-project-week1
DOCKERFILE_NAME=Dockerfile

# Dont change this :(
TAGNAME=cyberjutsu/wind-team:$DOCKERNAME

sudo docker stop $DOCKERNAME
sudo docker rm $DOCKERNAME
sudo docker build --no-cache -t $TAGNAME --file $DOCKERFILE_NAME .

# Below line is for apps that has 1 Dockerfile only
# Remember to change expose port too
PORT=8090
sudo docker run --name $DOCKERNAME -d -p $PORT:80 -it $TAGNAME
