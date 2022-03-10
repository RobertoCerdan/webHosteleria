<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Comentarios</h4>
                    <h6 class="card-subtitle">Opiniones de clientes</h6>
                </div>
                <form action="{{ route('comentario.store', $producto->id) }}" method="POST" class="form-group shadow-textarea">
                    <label for="exampleFormControlTextarea6">Deja tu opini&oacute;n aqu&iacute;!</label>
                    <textarea class="form-control z-depth-1" id="contenido-comentario" name="contenido-comentario" rows="3" placeholder="Deja tu opini&oacute;n aqu&iacute;!"></textarea>
                    <button type="submit" class="btn btn-secundary">Enviar</button>
                </div>
                @foreach($producto->comentarios as $comentario)
                <div class="comment-widgets m-b-20">
                    <div class="d-flex flex-row comment-row">
                        <div class="comment-text w-100">
                            <h5>{{ $comentario->user->name }}</h5>
                            <div class="comment-footer"> <span class="date">{{ $comentario->fecha }}</span> <span class="label label-info">Pending</span> <span class="action-icons"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">{{ $comentario->contenido }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>