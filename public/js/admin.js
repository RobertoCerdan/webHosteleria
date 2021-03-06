$('.actualizarEstado').on('click', actualizarEstadoPedido)

function actualizarEstadoPedido(){
    estado = $('#' + this.value).val();
    url="/pedido/update/" +  this.value + "?estado=" +  estado;
    $.ajax({
        url : url,
        type : 'GET',
        success : function(json) {
            $.notify("Se ha cambiado el estado del pedido correctamente",
            { position:"bottom right",
            clickToHide: true,
            className: 'success' });
        },
    
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });

}