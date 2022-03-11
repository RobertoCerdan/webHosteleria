@extends('layouts.master')

@section('contenedor')

<div class="col-12 pt-5 min-vh-100">
    <div class="row justify-content-end py-5">
        <div class="mb-1 mt-1" style="width: 3em;">
            <a href="{{route('producto.index')}}">
            <img class="img-fluid" src="{{ asset('iconos/volver.png') }}">
            </a>
        </div>  
    </div>
<form class="row justify-content-center" action="{{ route('producto.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">      
    @csrf         
    <h2 class="border-bottom border-secondary text-center col-md-5 col-xl-3 mb-3">Subir nuevo producto</h2>
    <div class="w-100"></div>
    <div class="form-floating col-md-5 col-xl-3 mb-2">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder=" ">
        <label for="nombre form-label">Nombre producto</label>
    </div>
    <div class="form-floating col-md-5 col-xl-3 mb-2">
        <input type="number" class="form-control" id="precio" name="precio" placeholder=" " min="0">
        <label for="precio">Precio</label>
    </div>   
    <div class="form-floating col-md-10 col-xl-6 m-2" style="height: 100px;">
        <textarea class="form-control h-100" placeholder="Descripción del plato" id="descripcion" name="descripcion"></textarea>
        <label for="descripcion">Descripci&oacute;n</label>
    </div>  
    <div class="col-md-10 col-xl-6 mb-3 ">
        <label for="img" class="form-label">Foto del plato</label>
        <input class="form-control" type="file" id="img" name="imagen">
    </div>
    <div class="w-100"></div>
    <div class="col-md-10 col-xl-6 mb-3 ">
        <label for="categoria" class="form-label">Categorias</label>
        <input class="form-control" list="categoriasOptions" id="categoria" name="categoria" placeholder="Buscar categoria...">
        <datalist id="categoriasOptions">
            //opciones
        </datalist>
    </div>
    <div class="w-100"></div>
    <button type="submit" class="btn btn-primary col-4 col-xl-3">Añadir</button>

</form>
@endsection