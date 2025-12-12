# Todo List REST API

Простое REST API для управления задачами на Laravel.

## Требования
- PHP 8.0+
- Composer
- SQLite (или другая БД)

## Установка

1. Клонировать репозиторий:

```bash
git clone https://github.com/miltorg/todo-api.git
cd todo-api
```

2. Установить зависимости:
```bash
composer install
```

3. Настроить окружение:
```bash
cp .env.example .env
# Copy-Item .env.example .env -Force
php artisan key:generate
```

4. Настроить базу данных (SQLite):
```bash
touch database/database.sqlite
# или в Windows:
# New-Item -Path "database" -ItemType Directory -Force | Out-Null
# New-Item -Path "database\database.sqlite" -ItemType File -Force | Out-Null
```

5. Выполнить миграции:
```bash
php artisan migrate
```

6. Запустить сервер:
```bash
php artisan serve
```

## API Endpoints

### Получить все задачи
```
GET /api/tasks
```

### Создать задачу
```
POST /api/tasks
Content-Type: application/json

{
    \"title\": \"Новая задача\",
    \"description\": \"Описание задачи\",
    \"status\": \"pending\"
}
```

### Получить задачу по ID
```
GET /api/tasks/{id}
```

### Обновить задачу
```
PUT /api/tasks/{id}
Content-Type: application/json

{
    \"title\": \"Обновленный заголовок\",
    \"description\": \"Новое описание\",
    \"status\": \"completed\"
}
```

### Удалить задачу
```
DELETE /api/tasks/{id}
```

## Примеры использования

```bash
# Создать задачу
curl -X POST http://localhost:8000/api/tasks \\
  -H \"Content-Type: application/json\" \\
  -d '{\"title\":\"Купить продукты\",\"description\":\"Молоко, хлеб\",\"status\":\"pending\"}'

# Получить все задачи
curl http://localhost:8000/api/tasks

# Обновить задачу
curl -X PUT http://localhost:8000/api/tasks/1 \\
  -H \"Content-Type: application/json\" \\
  -d '{\"status\":\"completed\"}'

# Удалить задачу
curl -X DELETE http://localhost:8000/api/tasks/1
```

## Структура проекта

```
todo-api/
├── app/
│   ├── Http/Controllers/TaskController.php
│   └── Models/Task.php
├── database/
│   └── migrations/
├── routes/
│   └── api.php
├── .env.example
├── .gitignore
├── composer.json
└── README.md
```
