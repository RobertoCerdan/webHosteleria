$('.aCesta').on('click', 'anadirACesta');
alert('hola');



function anadirACesta(){
    url="/carrito/anadir/" + this.id;

    alert(url);
    $.ajax({
        url : url,
        type : 'POST',
        success : function(json) {
            alert('Objeto añadido');
        },
    
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            alert('Petición realizada');
        }
    });
}

function get(){
    url="/carrito/get";

    $.ajax({
        url : url,
        type : 'GET',
        success : function(json) {
            incluirElementosCesta(json);
        },
    
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            alert('Petición realizada');
        }
    });
}

function incluirElementosCesta(productosJSON){
    contenedorElementos=$('.shopping-cart-items');
    productos=JSON.parse(productosJSON);
    html="";
    for (var producto in productos) {
        html+="<ul class='shopping-cart-items'><li class='clearfix'><img src='{{ asset('/storage/imagenes/'}}" + producto['imagen'] + "' alt='" +  producto['nombre'] +"' /><span class='item-name'>" + producto['nombre'] + "</span><span class='item-price'>" + producto['precio'] + "€</span><span class='item-quantity'>Cantidad: " + producto['nombre'] + "</span></li>";
    };
    contenedorElementos.html(html);
}
