# My Shop

Проект интернет-магазина на Laravel (бэкенд) и React (фронтенд).

## Установка

### Бэкенд
```bash
cd backend
composer install
cp .env.example .env
# настройте .env, создайте БД
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Фронтенд
```bash
cd frontend
npm install
npm start
```