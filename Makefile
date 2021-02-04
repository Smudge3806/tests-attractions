.PHONY: composer-install composer-interactive composer-add-dep composer-add-dev-dep
.SILENT: composer-install composer-interactive composer-add-dep composer-add-dev-dep

composer-install:
	docker run \
		--interactive \
		--tty \
		--rm \
		--volume $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))/src:/app \
		--user $(id -u):$(id -g) \
		composer:latest install --ignore-platform-reqs --no-scripts

composer-interactive:
	docker run \
		--interactive \
		--tty \
		--rm \
		--volume $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))/src:/app \
		--user $(id -u):$(id -g) \
		composer:latest /bin/bash

composer-add-dep:
	docker run \
		--interactive \
		--tty \
		--rm \
		--volume $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))/src:/app \
		--user $(id -u):$(id -g) \
		composer:latest /bin/bash -ci "composer require $(package) $(version) --ignore-platform-reqs --no-scripts"

composer-add-dev-dep:
	docker run \
		--interactive \
		--tty \
		--rm \
		--volume $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))/src:/app \
		--user $(id -u):$(id -g) \
		composer:latest /bin/bash -ci "composer require $(package) $(version) --dev --ignore-platform-reqs --no-scripts"

.PHONY: phpunit phpunit-ff phpcs phpcs-interactive
.SILENT: phpunit phpunit-ff phpcs phpcs-interactive

phpunit:
	docker-compose run \
		--rm \
		--entrypoint="vendor/bin/phpunit" \
		app

phpunit-ff:
	docker-compose run \
		--rm \
		--entrypoint="vendor/bin/phpunit --stop-on-failure" \
		app

phpcs:
	docker-compose run \
		--rm \
		--entrypoint="vendor/bin/phpcs" \
		app

phpcs-interactive:
	docker-compose run \
		--rm \
		--entrypoint="vendor/bin/phpcs -a" \
		app
