### CLI BEFORE RUN APP
Run compose up in the same root as docker-compose.yml
```sql
docker compose up -d
```
Run bash symfony 
```sql
docker exec -it www_docker_symfony bash
```
Install runtime symfony
```sql
cd project
composer require symfony/runtime
```
Configure database with fake data
```sql

php bin/console d:d:c
php bin/console d:m:m
php bin/console d:f:l
```

### Link
Run app with this [http://localhost:80](http://localhost:80)

### Access
Admin account

> * email : <b>kekes@mail.com</b> 
> * password :  <b>password</b>

### API
API that returns the services associated with a user.

GET   /api/service-user/{id_user}

```sql
curl -i -H 'Accept: application/json' http://localhost:80/api/service-user/1
```
