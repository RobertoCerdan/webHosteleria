recuperarCesta();
$('.aCesta').on('click', anadirACesta);
$('.aCesta').on('click', recuperarCesta);
$("#cart").on("click", toggle);
$('.cantidad-producto').on('focusout', actualizarCantidad);


 
function toggle(){
   $(".shopping-cart").fadeToggle( "fast");
}
 
function actualizarCantidad(){
    cantidad = $('#' +  this.id).val();
    url="/carrito/update/" + this.id + "?cantidad=" + cantidad;
    $.ajax({
        url : url,
        type : 'GET',
        success : function() {
        },

        error : function(xhr, status, textStatus) {
            alert('Disculpe, existió un problema' +  textStatus);
        },
    });
}


function anadirACesta(){
    url="/carrito/store/" + this.id;
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
    numElementosCarrito=0;
    totalCarrito=0;
    productos=productosJSON;
    html="";
    for (const [key, producto] of Object.entries(productos)) {
        console.log(producto);
        html+="<li class='clearfix row align-items-center'><div class='col-4'><img class='img-fluid' src='/storage/imagenes/" + producto['imagen'] + "' alt='" +  producto['name'] +"' /></div><div class='col-8'><span class='item-name'>" + producto['name'] + "</span><span class='item-price'>" + producto['price'] + "€</span><span class='item-quantity'>Cantidad: " + producto['qty'] + "</span></div></li>";
        numElementosCarrito+=producto['qty'];
        totalCarrito+=producto['price'] * producto['qty'];
    };
    $('.cart-badge').html(numElementosCarrito);
    $('.cart-total').html(totalCarrito + "&euro;");
    contenedorElementos.html(html);
}
