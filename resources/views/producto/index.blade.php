@extends('layouts.master')

@section('contenedor')
<div class="col-12 pt-5">
<div class="row justify-content-center row-cols-1 row-cols-md-2 g-4 px-lg-5 pt-5">
    <form class="input-group rounded w-75" action="{{ route('producto.index') }}" method="GET">
        <input id="barra-buscador" name="barra-buscador" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="input-group-text border-0" id="search-addon">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>

<div class="col-12  col-sm-7  col-md-5 col-lg-4 col-xxl-3 offset-xl-2 offset-lg-1">
    <form action="{{ route('producto.filtro')}}" method="get" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="input-group">
            <label for="plus"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg></label>
                <select class="form-select bg-transparent" name="categoria" aria-label="Default select example">
                                    <option value=""selected>Selecione una Categoria</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->categoria }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                    <option value="">Mostrar todos</option>
                </select>
                <button class="btn bg-transapent" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>   
    </form> 
    </div>
</div>
@if(Auth::user()->rol == 'Admin')
<div class="col-12 pt-3">
<div class="row row-cols-1 row-cols-md-2 g-4 px-lg-5 ">
    @foreach ($productos as $producto)
    <div class="col producto">
        <div class="card border-info text-center productocard">
        <img src="{{ asset('storage/imagenes/' .$producto->imagen) }}" class="card-img-top" alt="imagen de relleno">
        <a class="text-dark arriba" data-bs-toggle="modal" data-bs-target="#modalBorrar{{$producto->id}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
            </svg>
        </a>
            <div class="card-body">
                <h5 class="card-title">{{$producto->nombre}}</h5>
                <p class="card-text">Precio: {{$producto->precio}} &#8364</p>
                <hr>
                <a href="{{route('producto.show' , $producto->id)}}" class="btn btn-info text-white me-1">Ver detalles</a>
                <a href="#" id="{{$producto->id}} " class="btn btn-primary aCesta">Añadir a la cesta</a>  
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
    <div class="col-12 anadir d-flex justify-content-end mt-4 ">
        <a class="text-dark navbar-brand" href="{{route('producto.create')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>Añadir Producto nuevo</a>
    </div>
    <div class="col-12 my-4">
    <div class="col-12 my-4">
        <div class="d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    </div>
    </div>
    @foreach ($productos as $producto)
    <div class="modal fade" id="modalBorrar{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalBorrarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>    
                <div class="modal-body text-center">
                    <p>Estas seguro que quieres borrar este producto?</p>
                    <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" href="{{route('producto.destroy' , $producto->id)}}" class="btn btn-danger ms-1">Si</a>
                </div>
                </div>
        </div>
    </div>
    @endforeach
@else
<div class="col-12 pt-3">
<div class="row row-cols-1 row-cols-md-2 g-4 px-lg-5 ">
    @foreach ($productos as $producto)
        <div class="col producto">
            <div class="card border-info text-center productocard">
            <img src="{{ asset('storage/imagenes/' .$producto->imagen) }}" class="card-img-top" alt="imagen de relleno">
                <div class="card-body">
                    <h5 class="card-title">{{$producto->nombre}}</h5>
                    <p class="card-text">Precio: {{$producto->precio}} </p>
                    <hr>
                    <a href="{{route('producto.show' , $producto->id)}}" class="btn btn-info text-white me-1">Ver detalles</a>
                    <a href="#" id="{{$producto->id}} " class="btn btn-primary aCesta">Añadir a la cesta</a>  
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
    <div class="d-flex col-12 my-4 justify-content-center">
        {!! $productos->links() !!}
    </div>
@endif
@endsection