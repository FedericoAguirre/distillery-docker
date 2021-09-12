# Docker

## Introducción

¿Se les hace familiar?

![En mi máquina funciona](img/en-mi-computadora-si-funciona.png)

## ¿Qué es un contenedor?

Un **contenedor** *es una unidad estándar de software* que empaqueta código y todas sus dependencias de tal forma que la aplicación corre rápida y confiablemente desde un ambiente computacional a otro.

![Qué es un contenedor](img/container-what-is-container.png)

## Container vs virtual machine

Los contenedores y las máquinas virtuales tienen beneficios similares de asignación y aislamiento de recursos, pero funcionan de manera diferente porque los contenedores virtualizan el sistema operativo en lugar del hardware. **Los contenedores son más portátiles y eficientes.**

[Contenedores](https://www.docker.com/resources/what-container)

## Docker setup

Descargar el programa en [Docker](https://www.docker.com/get-started)

## Usar un contenedor - docker pull, docker ps, docker rm

[Camunda BPMN software](https://docs.camunda.org/manual/7.15/installation/docker/)

### docker pull - Descarga de imágenes

```bash
docker pull camunda/camunda-bpm-platform:run-latest
```

```bash
docker run -d --name camunda1 -p 8081:8080 camunda/camunda-bpm-platform:run-latest
docker run -d --name camunda2 -p 8082:8080 camunda/camunda-bpm-platform:run-latest
```

## Crear un contenedor customizado - Dockerfile

Crear un archivo docker (**Dockerfile**)

```
FROM php:7.1-apache
COPY ./todos-app/ /var/www/html/
```

[Docker file best practices](https://docs.docker.com/develop/develop-images/dockerfile_best-practices/)

[PHP Server](https://hub.docker.com/_/php)

## docker build

-f, --file string             Name of the Dockerfile (Default is 'PATH/Dockerfile')
-t, --tag list                Name and optionally a tag in the 'name:tag' format

```bash
docker build -t my-php-todos .
```

## docker run

```bash
docker run -dit --name my-todos-running-app -p 8080:80 my-php-todos
```

## docker image

### Listar imágenes

```bash
docker image ls -a
```

### Remover imagen

```bash
docker image rm my-php-todos
```

## docker ps - Mostrar contenedores activos

```bash
docker ps
docker container ps
docker ps -a
```

## docker logs - Revisar los logs del contenedor

```bash
docker logs my-todos-running-app
```

## docker exec - Ejecutar un comando dentro del contenedor

```bash
docker exec -it my-todos-running-app /bin/bash
```

## docker volume - Agregar volumenes de datos para guardar/actualizar nuestros cambios
```bash
docker run -dit --name my-todos-running-app -p 8080:80 my-php-todos
```

## docker network

## docker compose


TODOS:
- Agregar método appendTodo: Debe agregar un todo a la lista "todos" en redis
- Crear método para leer todos los registros en "todos" en redis
- Unir métodos con la aplicación con javascript