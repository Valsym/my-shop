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

## Поиск (OpenSearch)

Проект использует **OpenSearch** для полнотекстового поиска и автодополнения товаров.  
OpenSearch запускается в отдельном контейнере через **Laravel Sail**.

### Запуск и проверка
```bash
# Запуск контейнера OpenSearch 
# (если ещё не запущен командой sail up)
sail up -d opensearch

# Проверка доступности
curl http://localhost:9200
````
### Управление индексом
```bash
# Создать индекс с маппингом (edge_ngram + completion)
sail artisan app:index-mapping-products

# Переиндексация товаров из MySQL в OpenSearch
sail artisan app:index-products

# Удалить индекс (если нужно пересоздать)
curl -X DELETE "http://localhost:9200/products"
# или
sail down
docker volume rm backend_opensearch-data
sail up -d

```
### Поисковые маршруты
Полнотекстовый поиск: /search?q=принтер&price_min=10000&price_max=50000&from=0&size=10

Автодополнение: /suggest?q=прин

### Команды для разработки
Интерактивная консоль OpenSearch (через API):
```
sail exec opensearch curl -s "http://localhost:9200/products/_search?pretty&size=5"
```
Просмотр состояния кластера:
```
sail exec opensearch curl -s "http://localhost:9200/_cat/indices?v"
```
При необходимости настройки анализаторов или маппинга см. app/Console/Commands/IndexMappingProducts.php
