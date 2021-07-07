# Some phpunit tests

Just some small testing issues with phpunit.

## contains
- example how to test abstract classes and mock concrete methods in abstract classes

## start
```bash
docker-compose -pphpunit up -d
docker-compose -pphpunit exec php-fpm composer install
```

## run
```bash
docker-compose -pphpunit exec php-fpm vendor/bin/phpunit --testdox
```

