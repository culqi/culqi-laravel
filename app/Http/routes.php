<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Celular;
use Illuminate\Http\Request;
use Culqi\Culqi;
use Culqi\CulqiException;



Route::get('/', function(){
    $celulares = Celular::all();
    return View::make('index',compact('celulares'));
    
});


Route::get('/comprar/{id}', function($id){
    $celular = Celular::find($id);    
    return View::make('celular', array('celular' => $celular));
});

     
Route::post('tarjeta', function(Request $request){
    
    $token=$request->input('token');
    
    if($token){
        
        // Configurar tu API Key
        $SECRET_API_KEY = "ASa3QY0uw8LZ9eo9MM7zYzQRsZgQil7LR6UhI4/TdP8=";
    
        // Autenticación
        $culqi = new Culqi(array('api_key' => $SECRET_API_KEY));
    
        try{
            // Creamos Cargo a una tarjeta
            $cargo = $culqi->Cargos->create(
                array(
                    "token"=> $token,
                    "moneda"=> "PEN",
                    "monto"=> 19900,
                    "descripcion"=> "Venta de prueba",
                    "pedido"=> rand(),
                    "codigo_pais"=> "PE",
                    "ciudad"=> "Lima",
                    "usuario"=> "71701956",
                    "direccion"=> "Avenida Lima 1232",
                    "telefono"=> 12313123,
                    "nombres"=> "Stephan",
                    "apellidos"=> "Vargas",
                    "correo_electronico"=> "stephan.vargas@culqi.com"
                )
            );
            
            
        } catch(CulqiException $e){
  
          $cargo= "API error: " . htmlspecialchars($e->getMessage());
          break;
        } finally {
            echo 'hola';
        }
        
        
    
       
    

    }
    
});
