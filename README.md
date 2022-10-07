# Startup instructions
## Running with docker
<br>

### For linux
<b><i>
```bash
mkdir ./tmp/mysql -p && sudo chmod -R 777 ./web && sudo chmod -R 777 ./runtime && docker compose up --build -d --wait && docker exec -it yii-realtor-php-1 bash -c "composer u -n && composer i -n && php yii migrate/up --interactive=0"
```
</i></b>