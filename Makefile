SHELL='/bin/bash'

start:
	make stop
	@docker-compose up --build

stop:
	@docker-compose down

composer-install:
	make composer-run COMMAND="install"

composer-run:
	make php-composer-run COMMAND="composer ${COMMAND}"

php-composer-run:
	make php-composer-build
	docker run \
		--rm \
		--tty \
		--interactive \
		--workdir=/app \
		--user $(shell id -u):$(shell id -g) \
		--env COMPOSER_CACHE_DIR=/vendor-cache \
		--volume "$(PWD)":/app \
		--volume "$(PWD)/vendor-cache":/vendor-cache \
		php-composer ${COMMAND}

php-composer-build:
	docker build \
		--tag php-composer \
		devenv/php

composer-require:
	make composer-run COMMAND="composer require ${COMMAND}"

dump-autoload:
	make composer-run COMMAND="composer dump-autoload"

tests:
	make composer-run COMMAND="bin/phpunit"

php-cli-build:
	docker build \
		--tag php:custom \
		devenv/php-cli

php-cli-run:
	make php-cli-build
	docker run \
		--rm \
		--tty \
		--interactive \
		--workdir=/app \
		--user $(shell id -u):$(shell id -g) \
		--volume "$(PWD)":/app \
		php:custom ${COMMAND}

clear-cache:
	make php-cli-run COMMAND="bin/console cache:clear --no-warmup --env=prod"
