## Установка

- `composer install`
- `npm install`

## Локальное разворачивание

Нужна локальная бд (mysql, postgres), с названием uniteller (user: root, password: root).

- `php artisan migrate`
- `php artisan serve`
- `npm run dev`
- `php artisan queue:work`

## Комманды

### Создание фейковых пользователей

`php artisan create:users {count?}` - создает `count` фейковых юзеров. По умолчанию 10.

### Создание транзакций

`php artisan create:transaction` - создает пользовательскую транзакцию

Поиск не делал, огранизовал только полнотекстовый индекс.
