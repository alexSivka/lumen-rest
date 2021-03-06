# lumen-rest-test

Демо сервер [sivka-systems.ru](http://sivka-systems.ru/) можно сразу тестировать.


### Установка

```
git clone https://github.com/alexSivka/lumen-rest.git

cd lumen-rest

docker-compose up -d --build site
```

Контайнер доступен по адресу http://localhost

базу можно посмотреть по адресу http://localhost/adminer.php
```
host: mysql
user: root
pass: root
database: test
```

База уже с данными и таблицами. Код в папке src. тесты в src/tests.
Папку src также можно скопировать в свое окружение и запустить
```
php artisan migrate --seed
```

### api

Для работы с апи необходимо получить токен по запросу

```
POST /api/login 
params email: test@example.com, password: test
```

### методы 

Ко всем запросам необходимо добавлять заголовок Authorization: bearer your_token

К каждому участнику может быть привязано несколько мероприятий

Создание участника

```
POST /api/members
params: first_name, last_name, email
опционально event_id - id мероприятия
```

Изменение участника

```
PUT /api/members/{id}
params: first_name, last_name, email
опционально event_id - id мероприятия
```

Данные участника и связанных мероприятий

```
GET /api/members/{id}
```

Удаление участника

```
DELETE /api/members/{id}
```

Список всех участников мероприятия

```
GET /api/event-members/{event_id}
```

Список всех участников

```
GET /api/members
```