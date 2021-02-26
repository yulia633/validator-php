install:
	composer install

validate:
	composer validate

lint:
	composer exec -v phpcs -- --standard=PSR12 app tests -np

test:
	composer exec -v phpunit tests

test-coverage:
	composer exec -v phpunit tests -- --coverage-clover build/logs/clover.xml

