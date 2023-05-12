# Чтобы запустить проект нужно:

1. Создать локальную копию репозитория
```
git clone https://github.com/Barinulka/todolist.git
```
2. В папке с проектом скопировать файл:
>.env.example.php

3. Переименовать его в 
>.env.php

4. Заполнить данные для подключения к БД
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=название БД
DB_USERNAME=имя пользователя (mysql)
DB_PASSWORD=пароль пользователя (mysql)
```

5. Установить зависимости 
```
composer install
```

6. Применить доступные миграции
```
php artisan migrate
```

7. Запустить сервер
```
php artisan serve
```

7.1 Для OpenServer добавить в корневой каталог /todolist файл .htaccess c следующим содержимым:
```
RewriteEngine On
RewriteRule (.*) public/$1
```