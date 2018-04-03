.PHONY: test
test:
	./bin/behat --format=progress
	./bin/phpunit

.PHONY: db
db:
	./bin/console doctrine:database:drop --force
	./bin/console doctrine:database:create
	./bin/console doctrine:schema:update --force
