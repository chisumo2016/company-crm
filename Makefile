.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Welcome to IT Support , have you tried turning it off  and on again."

install:
		@composer install

test:
	docker exec company-crm_php php artisan test

migrate:
	declare exec  company-crm_php php artisan migrate

analyse:
	./vendor/bin/phpstan analyse

generate:
	docker exec company-crm_php php artisan ide-helper:models --write

nginx:
	docker exec -it company-crm_nginx /bin/sh

php:
	docker exec -it company-crm_php /bin/sh

mysql:
	docker exec -it company-crm_mysql /bin/sh

redis:
	docker exec -it company-crm_redis /bin/sh











