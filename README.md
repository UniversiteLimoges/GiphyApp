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
### Seeding
`$ php make:seeder TagsSeeder`
`$ composer dump-autoload`
`$ php artisan db:seed`


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

### User - Location : One To One
In User
```php
public function location() 
{
    return $this->hasOne('App\Location');
}
```
In Location
```php
public function user()
{
	return $this->belongsTo('App\User');
}
```



## Geolocation
### [Torann/GeoIP](https://github.com/Torann/laravel-geoip)
Used to get location information from IP visitor thanks to global $\_SERVER['REMOTE_ADDR'] variable

* New table locations
```php
 public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->float('lat', 8, 3)->nullable();
            $table->float('lon', 8, 3)->nullable();
            $table->timestamps();
        });
    }
```

* New Middleware 'geoIp'
```php
namespace App\Http\Middleware;

use Closure;
use App\Location;
use App\User;
use Illuminate\Support\Facades\Auth;

class GeoIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get current User
        $current_user = Auth::user();

        // Get instance of \Torann\GeoIP\Facades\GeoIP
        $actual_location = geoip()->getLocation($_SERVER['REMOTE_ADDR']);

        if( 
            $current_user->location
            //!empty($current_user->location_ip)
            //$current_user->has('location')
            ) {

            $location = $current_user->location;

            $location->user_id = $current_user->id;
            $location->ip = $_SERVER['REMOTE_ADDR'];
            $location->country = $actual_location->country;
            $location->city = $actual_location->city;
            $location->lat = $actual_location->lat;
            $location->lon = $actual_location->lon;

            $location->save();

        }else{

            $location = New Location();

            $location->user_id = $current_user->id;
            $location->ip = $_SERVER['REMOTE_ADDR'];
            $location->country = $actual_location->country;
            $location->city = $actual_location->city;
            $location->lat = $actual_location->lat;
            $location->lon = $actual_location->lon;

            $location->save();  
        }

        return $next($request);
    }
}
```



### [Google Map Embed](https://developers.google.com/maps/documentation/embed/start?hl=fr)