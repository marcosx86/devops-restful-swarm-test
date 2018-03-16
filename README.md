# devops-restful-swarm-test

```sh
docker build rest-app/ -t solutis-laravel

docker swarm init
docker stack deploy -c docker-compose.yml letsdevops
```

Criar banco de dados "solutis_test" em 
phpMyAdmin @ http://127.0.0.1:800

```ssh
docker run --rm -it -v $PWD/rest-app:/var/www/html solutis-laravel php artisan migrate
```

Aplicação Laravel+Angular @ http://127.0.0.1:8000
