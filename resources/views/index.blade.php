<html>
    
<head>
    <meta charset="UTF-8">
    <title>Lista de celulares</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="sticky-footer.css" rel="stylesheet">
</head>



<body>
    
    
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Tienda de celulares</h1>
        
        
        
            <table class="table table-bordered">
        
        
                @foreach ($celulares as $celular)
                
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="thumbnail">
                         <!-- <img src="..." alt="..."> -->
                          <div class="caption">
                            <h3>{{ $celular->titulo }}</h3>
                            <p>${{ round($celular->precio) }}</p>
                            <p><a  class="btn btn-primary" href="comprar/{{ $celular->id }}" class="btn btn-primary" role="button">Comprar</a> </p>
                          </div>
                        </div>
                      </div>
                    </div>
    
    
        
          
                @endforeach
            </table>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Una implementación de Culqi en Laravel</p>
      </div>
    </footer>

</body>
</html>


