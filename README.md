# devops-restful-swarm-test

```sh
docker build rest-app/ -t solutis-laravel

docker swarm init
docker stack deploy -c docker-compose.yml letsdevops
```

phpMyAdmin @ http://localhost:800

Aplicação Laravel+Angular @ http://localhost:8000
