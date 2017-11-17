#!/bin/sh

echo "Iniciando..."

docker build -t img-ts-cliente .
docker run --net nat --ip 172.31.112.11 -d -it -p 80:80 --name cont-ts-cliente img-ts-cliente