# Some phpunit tests

Just some small testing issues with phpunit.

## start
```bash
docker-compose -pphpunit up -d
docker-compose -pphpunit exec php-fpm composer install
```

## run
```bash
docker-compose -pphpunit exec php-fpm vendor/bin/phpunit tests --testdox
```

