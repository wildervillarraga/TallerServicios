#!/bin/sh

echo "Iniciando..."

docker build -t img-ts-cuenta .
docker run --net nat --ip 172.31.112.12 -d -it -p 80:80 --name cont-ts-cliente img-ts-cuenta