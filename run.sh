#!/bin/bash
# usage: ./run $build
#   - $build: true/false. Default value is true; 
#                         If value = false, the build step will be skipped;

if [ ! -z "$1" ] && [ "$1" == "false" ]
then
   echo "Build step skipped.."
else
  echo "Building..."
  bash build.sh
fi


sudo docker-compose down -v
sudo docker-compose up --build -d
