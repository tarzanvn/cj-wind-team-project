#!/bin/bash

bash build.sh

sudo docker-compose down -v
sudo docker-compose up --build -d
