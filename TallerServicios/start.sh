#!/bin/sh

echo "Iniciando..."

docker build -t img-ts-frontend .
docker run --net nat --ip 172.31.112.10 -d -it -p 80:80 --name cont-ts-frontend img-ts-frontend