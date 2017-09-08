<?php
/* 
Listing
Create 
View details
edit
*/

//Database como Celdas
//colecciones, datos organizados
    $c = collect(["uno","dos"]);

    $d= collect([
        ["id"=>1, "name"=>"khkhj", "city"=>"klhjh"],
        ["id"=>2, "name"=>"khkhj", "city"=>"klhjh"],
        ["id"=>3, "name"=>"khkhj", "city"=>"klhjh"]
    ]);

//accediendo a la data
    $c->first(); //el primero
    $c->last(); //el último
//accediendo a columnas
    $d->fetch("name");

//acceder a un dato en especifico
    //Usando "eloquent" para encontrar los datos correspondiente a una fila
    $m= Market::find(3);
    /* resultado:
        =>App\Market{
        ["id"=>3, "name"=>"khkhj", "city"=>"klhjh"]
        }
    */
    $m["name"]; //=>"khkhj"
    $m->name;//=>"khkhj"
    //ejemplo completo
    use App\Farm;
    $farm= Farm::find(2);
    echo $farm->name;


//CRUD
//Creando un market
    $m= new Market; //crea uno nuevo
    $m->name="Winter dasdljaklsjl";
    $m->save();  //guarda

//creación masiva
    $data=["name"=>"Winter kjhjkhk", "city"=>"hkhjk"]; //array con propiedades y valores
    Market::create($data); //crea y guarda 

//Consultar datos de un market
    $m = Market::find(3); //un item de la colección
    $market = Market::all(); //todos los items de una colección
    $market = Market::where("city", "Orlando") //consulta personalizada
                            ->orderBy("name", "desc") //ordenar
                            ->take(5)  //solo 5
                            ->get(); //correr la consulta

//Update
    $m= Market::find(3); 
    $m->name="Winter dasdljaklsjl";
    $m->save();  //guarda

//Update múltiple
    $m= Market::find(3); 
    $data=["name"=>"hkjhkhkhj", "website"=>"hkjhkhkhk"]
    $m->fill($data);  //completa

//Delete
    //simple
    $m= Market::find(3); 
    $m->delete();
    //simple, otra forma
    Market::destroy(3);
    //múltiple
    Market::destroy([3,4,5]);



//Models: administra la interacción entre la app y la db
    //clase con consulta en archivos separados
        //consulta simple que recibe el modelo
            $m= Market::find(3);
        //en app/Market.php   (Modelo)
            use Illuminate/Database/Eloquent/Model;
            class Market extends Model{
            }

    //Clase con consulta local
        Class Market extends Model{
            public function scopeOrlando(){
                return $query->where("city","Orlando")
                            ->orderBy("name","desc")
                            ->get();
            }
        }

        $orlandoMarkets= Market::orlando()->get(); //recibiendo la consulta

//Views: desplegar información al browser
    /*
    app
        http
            market.php
    resources
        views
            markets  <--- son múltiples, "hay que usar letra s"
                show.blade.php 
    */
    //utilizo la sintaxis de blade

    //en app.blade.php
        <body>
            @yield("main") //llama a la sección main
        </body>

    //en index.blade.php
        @extends("layouts.app")
        @section("main")
            @php 
                $market = Market::all(); //cuando tenga el controlador esto se borra
            @endphp 

            @foreach ($markets as $market)
                <h1>{{$market->name}}</h1>
                <h3>{{$market->city}}</h3>
            @endforeach
        @endsection

//Controlers y Routers
        /*
    app
        http
            Controllers
                MarketController.php
    resources
    */


//Un nuevo controlador
    namespace App/Http/Controllers;
    use App/Market;
    use Iluminate/Http/Request;

    class MarketController extends Controller{
        //mostrar todos los markets
        public function index(){
            $markets= Market::all();
            return view("markets.index", ["markets"=>$markets]) //el primer argumento es la ubicación del template,el segundo argumento es para pasar la data qye qyeremos ver en el view

        }
        //mostrar un único market
        public function show(Market $market){
            return view("market.show", ["market"=>$market]);
        }


    }
//Routing
    //Routing simple
        Route::get("/", function(){ //el primer argumento es la URL 
            return "Hello";
        });

        Route::get("markets/{id}", function($id){ //el segundo argumento es el callback
            return "Request market id=".$id;
        });
    //Routing con controllers
        //routes/web.php
            Route::get("/","MarketController@index"); //el @ es el método
            Route::get("markets", "MarketController@index");
            Route::get("markets/{market}/edit", "MarketController@edit");
            Route::resource("markets", "MarketController"); //agrupa a múltiples rutas
                //index, create, store, destroy, update, show, edit

        //Controllers/MarketController.php
            class MarkController extends Controller{
                public function index(){

                }
            }

    //para averiguar todas las rutas disponibles con artisan
            #route::list


//recomendaciones
    //https://larachat.co/
    
?>

