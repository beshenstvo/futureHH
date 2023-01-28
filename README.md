## Цель проекта
1. Разработать REST API

## Выполненные задачи
1. Создание миграций, фабрики, seeder.
2. Создание api-роутов.
3. Создание контроллеров для CRUD операций.
4. Валидация полей.
5. Подключение Vue.js.
6. Настройка роутов на Vue.js.
6. Верстка страниц на Vue.js + axios запросы.
7. Создание документации на Swagger.io.

### Запуск приложения
Запустим mysql server, создадим базу данных и настроим окружение в файле `.env`:
```sh
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
```sh
php artisan key:generate
```
Установим зависимости:
```sh
composer install
npm install
```
Запустим миграции:
```sh
php artisan migrate
```
Запустим проект:
```sh
php artisan serve
npm run watch
```

### Ссылка на документацию

- [Swaggerio](https://app.swaggerhub.com/apis/beshenstvo/Future/1.0.0) - документация API


> Для тестирования запросов использовался Postman
