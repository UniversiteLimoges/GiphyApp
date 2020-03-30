# Gify

## Introduction 

Gify is an test project where we will test __SPA__ architecture based on __Laravel__ and __Vue__.

Through Gify, users can to meet each others according to some attributes :

* Geolocalisation.
* Tags (that represent their personals traits).

```
$ composer create-project --prefer-dist laravel/laravel Gify
$ cd Gify
$ composer require laravel/ui
$ php artisan ui vue --auth
$ npm install
$ npm run dev
```

### Database

We use SQLite database support.

```
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
DB_FOREIGN_KEYS=true
```

```
$ touch database/database.sqlite
$ php artisan migrate
```

