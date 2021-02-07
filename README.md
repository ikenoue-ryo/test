# バージョン
Laravel 6.20.16  

# 起動
docker-compose up -d --build  
docker-compose exec app bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate

<!-- コマンド
docker-compose exec app php artisan serve --host localhost --port 10080
docker-compose exec app php artisan --version
ルーティング確認： php artisan route:list
MYSQL: docker-compose exec db bash
       mysql -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE
       SELECT * FROM todos;
       show databases;
       show tables;
       desc todos;
-->