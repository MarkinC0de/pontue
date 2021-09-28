#!/usr/bin/make

# choco install make

.DEFAULT_GOAL := help

help:  ## Display this help
	@echo "Help"

##@ Initialize work

init: ## Start a new develop environment
	cp .env.example .env
	cp docker-compose.yml.example docker-compose.yml

	docker-compose up -d

	@sleep 10

	docker-compose exec pontue-nginx bash -c "su -c 'php artisan migrate' application"

##@ Docker actions

dev: ## Start containers detached
	docker-compose up -d

logs: ## Show the output logs
	docker-compose logs

log: ## Open the logs and follow the news
	docker-compose logs --follow

restart: ## Restart the app container
	docker-compose restart pontue-nginx

##@ Bash shortcuts

nginx: ## Enter bash nginx container
	docker-compose exec pontue-nginx bash

mysql: ## Enter bash nginx container
	docker-compose exec pontue-mysql bash

##@ Database tools

migration: ## Create migration file
	docker-compose exec pontue-nginx bash -c "su -c \"php artisan make:migration $(name)\" application"

migrate: ## Perform migrations
	docker-compose exec pontue-nginx php artisan migrate

rollback: ## Rollback migration
	docker-compose exec pontue-nginx php artisan migrate:rollback

install: ## Composer install dependencies
	docker-compose exec pontue-nginx bash -c "su -c \"composer install\" application"

route: ## List the routes of the app
	docker-compose exec pontue-nginx php artisan routes:list
