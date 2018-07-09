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

@if($remito->id)
@section('title', 'Editar Remito')
<form class="needs-validation" action="{{ route('updateRemito', $remito->id) }}" method="post" novalidate>
  <input type="hidden" name="_method" value="put">
@else
@section('title', 'Nuevo Remito')
<form class="needs-validation" action="{{ route('storeRemito') }}" method="post" novalidate>
@endif

  {{ csrf_field() }}

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDireccion">Monto total</label>
      <input
        type="text"
        name="monto_total"
        class="form-control"
        id="inputMonto"
        placeholder="Monto total"
        value="{{ old('monto_total', $remito->monto_total) }}"
        required>
      <div class="invalid-feedback">
        Por favor agregue un monto
      </div>
    </div>

    <div class="form-group col-md-6">
      <div class="form-group col-md-6">
      <label for="inputDireccion">Proveedor</label>
        <select
          type="select"
          class="form-control"
          name="proveedor_id">
          @foreach( $proveedores as $prov )
          <option
            @if( $prov->id == $remito->proveedor_id )
            selected
            @endif
            value="{{ $prov->id }}">{{ $prov->id }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFechaAlta">Fecha de emisión</label>
        <input
          type="datetime-local"
          name="fecha_emision"
          class="form-control"
          id="inputFechaEmision"
          value="{{ old('fecha_emision', Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')) }}"
          required>
        <div class="invalid-feedback">
          Por favor agregue una fecha válida
        </div>
      </div>
  </div>

  @if($remito->id)
    <button class="btn btn-success" type="submit">Modificar</button>
  @else
    <button class="btn btn-success" type="submit">Agregar</button>
  @endif
</form>

<script type="text/javascript" src="/js/front-validation.js"></script>
@endsection
