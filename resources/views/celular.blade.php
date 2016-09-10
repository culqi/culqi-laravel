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
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                 <!-- <img src="..." alt="..."> -->
                  <div class="caption">
                    <h3>{{ $celular->titulo }}</h3>
                    <p>${{ round($celular->precio) }}</p>
                    <p>{{ $celular->descripcion }}</p>
                    <p><a  id="miBoton" class="btn btn-primary"  class="btn btn-primary" role="button">Pagar</a> </p>
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
            monto: {{$celular->precio}},
            guardar:false
        });
    </script> 
    <script>
        $('#miBoton').on('click', function (e) {
            // Abre el formulario con las opciones de Culqi.configurar
            Culqi.abrir();
            e.preventDefault();
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
           $.post("../tarjeta", // Ruta hacia donde enviaremos el token vía POST
            {token: Culqi.token.id},
            function(data, status){
                if (data=='ok') {
                    alert('Pago realizado con éxito!');
                } else {
                    alert('Error');
                }
            });
           }
    };
    </script>  
 
</body>
</html>