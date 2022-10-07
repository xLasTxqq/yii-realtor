# Startup instructions
## Running with docker
<br>

### For linux
<b><i>
```bash
mkdir ./tmp/mysql -p && sudo chmod -R 777 ./web && sudo chmod -R 777 ./runtime && docker compose up --build -d && docker exec -it yii-realtor-php-1 bash -c "composer i && php yii migrate"
```
</i></b>