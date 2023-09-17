PHP_CONTAINER_NAME = HITCH-APP
MYSQL_CONTAINER_NAME = HITCH-DB
REDIS_CONTAINER_NAME = HITCH-REDIS
SHELL = /bin/bash

###### 	NOT RUN IN PROD
fresh-start: prune cache-folders re-build composer-install sleep refresh-db
###### 	NOT RUN IN PROD

restart: cache-folders up composer-install sleep refresh-db

erase:
	docker-compose down -v --remove-orphans
	docker-compose down --volumes
	truncate -s 0 ./var/log/*.log

prune: erase
	docker system prune --volumes
	docker image prune --all

cache-folders:
	mkdir -p ~/.composer
	sudo chown -R ${UID}:${GID} ~/.composer
	mkdir -p var/cache var/log
	sudo chown -R ${UID}:${GID} var/cache var/log && sudo chmod -R 775 var/cache var/log

re-build:
	docker-compose up -d --build

up:
	docker-compose up -d

down:
	docker-compose down

composer-install:
	docker exec $(PHP_CONTAINER_NAME) composer install

redis:
	docker exec -it $(REDIS_CONTAINER_NAME) bash

shell:
	docker exec -it $(PHP_CONTAINER_NAME) bash

db:
	docker exec -it $(MYSQL_CONTAINER_NAME) bash

refresh-db:
	docker exec $(PHP_CONTAINER_NAME) php artisan mig:fresh

seed-db:
	docker exec $(PHP_CONTAINER_NAME) php artisan db:seed

clear-cache:
	docker exec $(PHP_CONTAINER_NAME) php artisan optimize:clear

test:
	docker exec $(PHP_CONTAINER_NAME) ./vendor/bin/phpunit

sleep:
	timeout 300