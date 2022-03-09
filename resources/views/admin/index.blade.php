@extends('layouts.master')

@section('contenedor')
<table class="table table-responsive">
  <caption>Pedidos</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pedidos as $pedido)
    <tr>
      <th scope="row">{{ $pedido['id'] }}</th>
      <td>{{ $pedido['user_name'] }}</td>
      <td>{{ $pedido['fechaReserva'] }}</td>
      <td><select id="{{ $pedido['id'] }}" class="form-select" >
          <option value="En proceso" 
            @if($pedido['estado']== 'En proceso')
                selected
            @endif
            >En proceso</option>
            <option value="Preparado" 
            @if($pedido['estado']== 'Preparado')
                selected
            @endif
            >Preparado</option>
            <option value="En proceso" 
            @if($pedido['estado']== 'Entregado')
                selected
            @endif
            >En proceso</option>
          
      </select></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection