.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Welcome to IT Support , have you tried turning it off  and on again."

install:
		@composer install

test:
	@docker exec company-crm_php php artisan test

migrate:
	@docker exec  company-crm_php php artisan migrate

seed:
	@docker exec  company-crm_php php artisan db:seed

key:
	@docker exec  company-crm_php php artisan key:generate

cache:
	@docker exec  company-crm_php php artisan cache:clear

config:
	@docker exec  company-crm_php php artisan config:cache

analyse:
	./vendor/bin/phpstan analyse

generate:
	@docker exec company-crm_php php artisan ide-helper:models --write

nginx:
	@docker exec -it company-crm_nginx /bin/sh

php:
	@docker exec -it company-crm_php /bin/sh

mysql:
	@docker exec -it company-crm_mysql /bin/sh

redis:
	@docker exec -it company-crm_redis /bin/sh











