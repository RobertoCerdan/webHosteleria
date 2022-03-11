<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Listo</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <img class="img-fluid" src="https://navarra.elespanol.com/asset/thumbnail,992,558,center,center//media/navarra/images/2018/03/08/2018030810375031373.jpg">
            </div>
            <h2>Su pedido con <b>ID: {{ $pedido->id }} </b>está listo para recoger</h2>
            <p>Puede pasar a recoger su pedido en el mostrador. Muchas gracias por elegirnos como su establecimiento de referencia.</p>
        </div>
    </div>    
</body>
</html>