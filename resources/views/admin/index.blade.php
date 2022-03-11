@extends('layouts.master')

@section('head')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('contenedor')
<table class="table table-responsive mx-auto" style="max-width: 1500px;">
  <caption>Pedidos</caption>
  <thead>
    <tr class="d-flex justify-content-around">
      <th>ID</th>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Estado</th>
      <th>Actualizar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pedidos as $pedido)
    <tr  class="d-flex justify-content-around mt-2 p-1">
      <th scope="row">{{ $pedido['id'] }}</th>
      <td>{{ $pedido['user_name'] }}</td>
      <td>{{ $pedido['fechaReserva'] }}</td>
      <td><select id="{{ $pedido['id'] }}" class="form-select" >
          <option value="En Proceso" 
            @if($pedido['estado']== 'En Proceso')
                selected
            @endif
            >En proceso</option>
            <option value="Preparado" 
            @if($pedido['estado']== 'Preparado')
                selected
            @endif
            >Preparado</option>
            <option value="Entregado" 
            @if($pedido['estado']== 'Entregado')
                selected
            @endif
            >En proceso</option>
          
      </select></td>
      <td><button type="button" value="{{$pedido['id']}}" class="btn btn-warning actualizarEstado ml-3">&#10003;
</button></td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estado actualizado!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Se ha actualizado correctamente el estado del pedido.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection