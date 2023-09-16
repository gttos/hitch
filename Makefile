PHP_CONTAINER_NAME = HITCH-APP
MYSQL_CONTAINER_NAME = HITCH-DB
REDIS_CONTAINER_NAME = HITCH-REDIS
SHELL = /bin/bash

###### 	NOT RUN IN PROD
fresh-start:
	mv docker-compose.prod.yml docker-compose.yml
	docker-compose down --volumes
###### 	NOT RUN IN PROD

restart: cache-folders composer-install restart-db

erase:
	-docker-compose down -v --remove-orphans;
	-truncate -s 0 ./var/log/*.log

prune: erase
	docker system prune --volumes
	docker image prune --all

cache-folders:
	-mkdir -p ~/.composer
	-sudo chown -R ${UID}:${GID} ~/.composer
	-mkdir -p var/cache var/log
	-sudo chown -R ${UID}:${GID} var/cache var/log && sudo chmod -R 777 var/cache var/log

build-base:
	docker-compose up -d --build

down:
	@docker-compose down

redis:
	@docker exec -it $(REDIS_CONTAINER_NAME) bash

shell:
	@docker exec -it $(PHP_CONTAINER_NAME) bash

db:
	@docker exec -it $(MYSQL_CONTAINER_NAME) bash

refresh-db:
	@docker exec $(PHP_CONTAINER_NAME) php artisan mig:fresh

migrate-db:
	@make refresh-db
	@docker exec $(PHP_CONTAINER_NAME) php artisan db:seed

recreate-db:
	@make composer-dump
	@make clear-cache
	@make migrate-db

clear-cache:
	@docker exec $(PHP_CONTAINER_NAME) php artisan optimize:clear

test:
	@docker exec $(PHP_CONTAINER_NAME) ./vendor/bin/phpunit
