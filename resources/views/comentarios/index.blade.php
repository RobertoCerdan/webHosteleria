<div class="row justify-content-center">
        <div class="col-md-12 p-3">
            
                    <h4 class="card-title">Comentarios</h4>
                <form action="{{ route('comentario.store', $producto->id) }}" method="POST" class="form-group shadow-textarea text-center">
                    @csrf
                    <textarea class="form-control z-depth-1 m-2" id="contenido-comentario" name="contenido-comentario" rows="3" placeholder="Deja tu opini&oacute;n aqu&iacute;!"></textarea>
                    <button type="submit" class="btn btn-success w-25 ">Enviar</button>
                </form>
                <h6 class="card-subtitle">Opiniones de clientes</h6>
                <div class="comment-widgets m-b-20 my-1">
                @foreach($producto->comentarios as $comentario)    
                <div class="card m-3 p-2">
                    <div class="d-flex flex-row comment-row">
                        <div class="comment-text w-100">
                            <h5>{{ $comentario->user->name }}</h5>
                            <div class="comment-footer"> <span class="label label-info">{{ $comentario->fecha }}</span> <span class="action-icons"> 
                                @if(Auth::user()->rol=='Admin')
                                <a href="{{ route('comentario.destroy', $comentario->id, $producto->id) }}" data-abc="true"><i class="fa fa-trash"></i></a> 
                                @endif
                                <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">{{ $comentario->contenido }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            
        </div>
    </div>