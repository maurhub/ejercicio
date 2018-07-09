@extends('layouts.home')

@section('title', 'Remitos')

@section('content')
  <div class="content">
    @include('tables.remitos_proveedor')
  </div>
@endsection
