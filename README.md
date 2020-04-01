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

#### Seeding
`$ php make:seeder TagsSeeder`
`$ composer dump-autoload`
`$ php artisan db:seed`



### CSS [Tailwind](https://laravel-mix.com/extensions/tailwindcss)

Need to modify _webpack.mix.js_ file: 

```js
const mix = require('laravel-mix');
require('mix-tailwindcss');  // <=====

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css').tailwind(); // <======

```

`npm run dev`





## Models Structure
### Tag
```php
$table->enum('type', ['fav','trait'])->nullable();
```


## Eloquent Relationships

Gify app needs to some relationships between their tables <=> Models

### Tag - User : Many To Many 

_App/User_ 

```php
public function tag()
{
    return $this->belongsToMany('App\Tag');
}
``` 
_App/Tag_ 

```php
public function user()
{
	return $this->belongsToMany('App\User');
}
``` 

_database/database.sqlite_ : __tag_user__ : tag_id , user_id ; 

#### Retrieve
```php
$user = App\User::find(1);

foreach ($user->tag as $t) {
    //
}
```

#### Attaching / Detaching
```php
$user = App\User::find(1);

$user->tag()->attach($tagId);
    //
}
```

```php
$user->tag()->detach($tagId);

// Detach all roles from the user...
$user->tag()->detach();
}
```



## Geolocation
### [Torann/GeoIP](https://github.com/Torann/laravel-geoip)
Used to get location information from IP visitor thanks to global $\_SERVER['REMOTE_ADDR'] variable



### [Google Map Embed](https://developers.google.com/maps/documentation/embed/start?hl=fr)