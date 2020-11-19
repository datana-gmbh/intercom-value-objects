# vim: set tabstop=8 softtabstop=8 noexpandtab:
cs:
	composer install --no-interaction --no-progress --working-dir=tools
	docker run --rm -it -w /app -v ${PWD}:/app oskarstark/php-cs-fixer-ga:2.16.7 --diff --verbose

test:
	php vendor/bin/phpunit -v
