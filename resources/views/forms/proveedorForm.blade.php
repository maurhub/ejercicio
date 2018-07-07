@extends('layouts.home')


@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($proveedor->id)
@section('title', 'Editar Proveedor')
<form class="needs-validation" action="{{ route('updateProveedor', $proveedor->id) }}" method="post" novalidate>
  <input type="hidden" name="_method" value="put">
@else
@section('title', 'Nuevo Proveedor')
<form class="needs-validation" action="{{ route('storeProveedor') }}" method="post" novalidate>
@endif

  {{ csrf_field() }}

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDireccion">Dirección</label>
      <input
        type="text"
        name="direccion"
        class="form-control"
        id="inputDireccion"
        placeholder="Dirección"
        value="{{ old('direccion', $proveedor->direccion) }}"
        required>
      <div class="invalid-feedback">
        Por favor agregue una dirección
      </div>
    </div>

    <div class="form-group col-md-6">
      <label for="inputTelefono">Teléfono (Opcional)</label>
      <input
        type="text"
        name="telefono"
        class="form-control"
        id="inputTelefono"
        placeholder="Teléfono"
        value="{{ old('telefono', $proveedor->telefono) }}">
    </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFechaAlta">Fecha de alta</label>
        <input
          type="datetime-local"
          name="fecha_alta"
          class="form-control"
          id="inputFechaAlta"
          value="{{ old('fecha_alta', Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')) }}"
          required>
        <div class="invalid-feedback">
          Por favor agregue una fecha válida
        </div>
      </div>
  </div>

@if($proveedor->id)
  <button class="btn btn-success" type="submit">Modificar</button>
@else
  <button class="btn btn-success" type="submit">Agregar</button>
@endif

</form>

<script type="text/javascript" src="/js/front-validation.js"></script>
@endsection
