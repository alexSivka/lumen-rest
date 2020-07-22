# lumen-rest-test

Демо сервер [sivka-systems.ru](http://sivka-systems.ru/)


### Установка

```
git clone https://github.com/alexSivka/lumen-rest.git

docker-compose up -d
```

Для работы с апи необходимо получить токен по запросу

```
POST /api/login 
params email: test@example.com, password: test
```

### методы 

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