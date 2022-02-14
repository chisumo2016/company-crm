.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Welcome to IT Support , have you tried turning it off  and on again."

install:
		@composer install

test:
	@docker exec company-crm_php php artisan test
	#@docker exec company-crm_php ./vendor/bin/phpunit

migrate:
	@docker exec  company-crm_php php artisan migrate

fresh:
	@docker exec  company-crm_php php artisan migrate:fresh

key-generate:
	@docker exec  company-crm_php php artisan key:generate

key-generate:
	@docker exec  company-crm_php php artisan config:cache

coverage:
	@docker exec company-crm_php .vendor/bin/pest --coverage

seed:
	@docker exec  company-crm_php php artisan db:seed

key:
	@docker exec  company-crm_php php artisan key:generate

cache:
	@docker exec  company-crm_php php artisan cache:clear

config:
	@docker exec  company-crm_php php artisan config:cache

analyse:
	./vendor/bin/phpstan analyse --memory-limit=26m

generate:
	@docker exec company-crm_php php artisan ide-helper:models --write

nginx:
	@docker exec -it company-crm_nginx /bin/sh

php:
	@docker exec -it company-crm_php /bin/sh

mysql:
	@docker exec -it company-crm_mysql /bin/sh

phpmyadmin:
	@docker exec -it company-crm_phpmyadmin /bin/sh

redis:
	@docker exec -it company-crm_redis /bin/sh

dusk:
	@docker exec company-crm_php php artisan dusk









