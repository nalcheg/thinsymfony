#!/usr/bin/env bash

cd ../../ && docker build -t nalcheg/nginx-php-fpm-app-public -f development/nginx/Dockerfile .
docker push nalcheg/nginx-php-fpm-app-public
