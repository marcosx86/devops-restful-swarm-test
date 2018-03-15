# devops-restful-swarm-test

```sh
docker build rest-app/ -t solutis-laravel

docker swarm init
docker stack deploy -c docker-compose.yml letsdevops
```

phpMyAdmin @ http://127.0.0.1:800

Aplicação Laravel+Angular @ http://127.0.0.1:8000
