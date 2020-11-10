## Descarga del instalador de laravel
```
$ composer global require laravel/installer
```

## Creando un nuevo proyecto
```
$ laravel new mercado
```

## Iniciar 
(en caso de que no este con Laragon)
```
$ php artisan serve
```

## Crear Model con migración
```
$ php artisan make:model -m Producto
```

El model se encontrara en ```/app/Models/Producto.php```
El archivo de migración se encontrará en ```/database/migrations/2020_11_09_233842_create_productos_table.php```


# Database
## Creando una db

```
$ mysql -u root -p
mysql> create database mercadodb;
mysql> exit
```

# conectando con la base de datos (usando .env)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mercadodb
DB_USERNAME=root
DB_PASSWORD=
```

# corriendo las migraciones

```
$ php artisan migrate
```

# checkeando las tablas

```
mysql> use mercadodb;
mysql> show tables;

+------------------+
| Tables_in_market |
+------------------+
| productos        |
| migrations       |
| password_resets  |
| users            |
| failed_jobs      |
+------------------+
```

## Usando tinker para consultar

``` 
$ php artisan tinker
>>> App\Market::all()
```

## Creando una nueva entrada

Antes de asignar nueva data,hay que agregar un fillable en el model (app/Market.php) 

```
protected $fillable= ["name","city","website"];
```

Ahora con tinker:
```
>>> $data =["name"=>"Orlando Farmers Marker", "city" => "Orlando", "website" => "orlandomarket.com"]
>>> App\Market::create($data)
```

# Routing a traves de un controlador a una vista

## Crear un controller

```
$ php artisan make:controller -m Model [NombreController]
```

Ejemplo:
```
$ php artisan make:controller -m Market MarketController
```
El controlador se encontrará en:
```app/http/controllers/MarketController.php```


## Agregando los controller en routes
en el archivo ```(/routes/web.php)``` agrego:

```
Route::get("/", "MarketController@index");
Route::resource("markets", "MarketController");
```

## Ver todas las rutas disponibles

```
$ php artisan route:list
```
## Modificando al controller

```
    public function index()
    {
        //agrego lo que debe hacer el controller
        $markets= Market::all();
        return view("markets.index", ["markets"=>$markets]);
        //el markets.index va a buscar a /views/markets/index.blade.php
    }
```

## Agregando la vista
para la vista se creo un archivo ```/views/markets/index.blade.php```

```
    <ul>
    @foreach($markets as $market)
        <li>
            <a href="{{route('markets.show',$market)}}">{{$market->name}} </a>
        </li>
    @endforeach
    </ul>
```

# Layouts y Forms
## Creando nuestro propio layout (MasterPage)
en ```/resources/views/layout/app.blade.php```

```
<html>
    <head> </title>Farm to Market </title><head>
    <body>
        @yield("main")
    </body>
</html>
```

## Agregando el layout

```
    @extends("layouts.app");
    @section("main")
        <ul></ul>
    @endsection
```

## Agregando páginación
en el controlador

```
    public function index()
    {
        $markets= Market::orderBy("name", "asc")->paginate(9);
        ...
    }
```
en la vista
```
    {{$markets->links()}}
```

## Validación

# Relationships
## Creando tabla intermedia

```
$ php artisan make:migration create_farm_market_pivot_table --create farm_market
```

## Modifico la migracion para aceptar las claves foraneas
```
        Schema::create('farm_market', function (Blueprint $table) {
           
            $table->integer("farm_id")->unsigned()->index();
            $table->foreign("farm_id")->references("id")
                    ->on("farms")->onDelete("cascade");
            
            $table->integer("market_id")->unsigned()->index();
            $table->foreign("market_id")->references("id")
                      ->on("markets")->onDelete("cascade");

            $table->timestamps();
        });
```
luego debo correr las migraciones

## Agrego las referencias en el modelo

```
    class Market extends Model
    {...
        public function farms(){
            return $this->belongsToMany("App\Farm")->withTimestamps();
        } 
    }

    class Farm extends Model
    {...
        public function markets(){
            return $this->belongsToMany("App\Market")->withTimestamps();
        }    
    }
```

## Agregando data a la tabla intermedia

```
    $  php artisan tinker
    >> $market = App\Market::first()
    >> $farm=App\Farm:first()
    >> $market->farms()->save($farm)
    >> $market->farms()->count()
```

















