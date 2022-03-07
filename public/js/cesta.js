recuperarCesta();
$('.aCesta').on('click', anadirACesta);
$("#cart").on("click", toggle);


 
function toggle(){
   $(".shopping-cart").fadeToggle( "fast");
}
 
function actualizarCantidad(){
    cantidad = $('.cantidad-producto').val();
    url="/carrito/update/" + this.id + "?cantidad=" + cantidad;

    alert(url);
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
    });
}


function anadirACesta(){
    url="/carrito/store/" + this.id;

    alert(url);
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
    });
}

function recuperarCesta(){
    url="/carrito/restore";

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
            console.log('Disculpe, existió un problema');
        }
    });
}

function incluirElementosCesta(productosJSON){
    contenedorElementos=$('.shopping-cart-items');
    productos=productosJSON;
    html="";
    for (const [key, producto] of Object.entries(productos)) {
        console.log(producto);
        html+="<li class='clearfix row align-items-center'><div class='col-4'><img class='img-fluid' src='/storage/imagenes/" + producto['imagen'] + "' alt='" +  producto['name'] +"' /></div><div class='col-8'><span class='item-name'>" + producto['name'] + "</span><span class='item-price'>" + producto['price'] + "€</span><span class='item-quantity'>Cantidad: " + producto['qty'] + "</span></div></li>";
    };
    contenedorElementos.html(html);
}
