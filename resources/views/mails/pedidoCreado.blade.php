<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Creado</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <img class="img-fluid" src="https://cdn.autobild.es/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2015/03/404447-ahora-chef-cocina-casa-ultimo-gastronomia.jpg?itok=8EG6zkSw">
            </div>
            <h2>Su pedido con <b>ID: {{ $pedido->id }} </b>está preparandose</h2>
            <p>Se le comunicará por email cuando el pedido este listo.Gracias por su colaboración!</p>
        </div>
    </div>    
</body>
</html>