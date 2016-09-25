<html>
<head>
    <meta charset="UTF-8">
    <title>Compra</title>
</head>
<body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Tienda de celulares</h1>
        <p>Regresar a productos <a href="/public">aquí</a></p>
        
       
            <table class="table table-bordered">
            <div class="row">
              <div class=" col-md-6">
                <div class="thumbnail">
                 <!-- <img src="..." alt="..."> -->
                  <div class="caption">
                    <h3>{{ $celular->titulo }}</h3>
                    <p>${{ round($celular->precio) }}</p>
                    <p>{{ $celular->descripcion }}</p>
                    <p><a  id="miBoton" class="btn btn-primary"  class="btn btn-primary" role="button">Pagar</a> </p>
                    Acepto los <a href="#">términos y condiciones </a><input type="checkbox" id="check"/>
                 
                  </div>
                </div>
              </div>
            </div>
            </table>
    
   
      </div>
   </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Una implementación de Culqi en Laravel</p>
      </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../sticky-footer.css" rel="stylesheet">
    <script src="https://integ-pago.culqi.com/js/v1"></script>  
    
    <script>  
        Culqi.codigoComercio = '4s4cv6LfyqNI';
        Culqi.configurar({
            nombre: '{{$celular->titulo}}', 
            orden: '{{$celular->id}}', 
            moneda: 'PEN',
            descripcion: '{{$celular->descripcion}}',
            monto: {{$celular->precio*100}},
            guardar:false
        });
    </script> 
    <script>
        
        $('#miBoton').on('click', function (e) {
            
            if($("#check").is(':checked')){
                // Abre el formulario con las opciones de Culqi.configurar
                Culqi.abrir();
                e.preventDefault();
            }else{
                alert('acepta los terminos y condiciones.')
            }
                
            });
    </script>
    <script>  
    // Ejemplo: Tratando respuesta con AJAX (jQuery)
    function culqi() {
    
        if(Culqi.error){
           // Mostramos JSON de objeto error en consola
           console.log(Culqi.error);
    
           alert("Culqi.error.mensaje");
        }
        else{
           console.log(Culqi.token.id);
           
           $.post("../tarjeta", // Ruta hacia donde enviaremos el token vía POST
            {token: Culqi.token.id, id_producto:{{$celular->id}}},
            function(data, status){
                console.log(data);
                
                data=JSON.parse(data); //convertir data a objeto js
                
                console.log(data);
                
                if(data.objeto=="cargo"){
                    alert("Cargo realizado exitosamente");
                }else{
                    data=JSON.parse(data); //convertir data a objeto js
                    console.log(data);
                    alert(data.error_mensaje_usuario);
                }
                
            //capturando json
            });
           }
    };
    </script>  
 
</body>
</html>