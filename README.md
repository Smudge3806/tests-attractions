# Attractions.io Technical Test

## Pre-requisities

* GNU Make
* Docker
* Docker-Compose

## Setup

```shell
make composer-install
```

If you don't have `GNU Make` then you can use the following snippet:
```shell
	docker run --interactive --tty --rm --volume ./src:/app --user $(id -u):$(id -g) composer:latest install --ignore-platform-reqs --no-scripts
```

## Running the Code

```shell
make phpunit
```

If you don't have `GNU Make` then you can use the following snippet:
```shell
	docker-compose run --rm --entrypoint="vendor/bin/phpunit" app
```
