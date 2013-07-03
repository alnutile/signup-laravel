clear
#php artisan migrate:refresh --env="test"
php artisan db:seed --env="test"
codecept run --html
php artisan migrate:refresh --env="test"
