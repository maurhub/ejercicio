<table class="table table-striped">

  <thead class="table-header text-white bg-dark">
    <tr>
      <th scope="col">Proveedor</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Fecha de alta</th>
      <th scope="col" colspan="2">
        <a href="{{ route('createProveedor') }}">
          <img class="icon" src="images/add.png" alt="add">
        </a>
      </th>
    </tr>
  </thead>

  <tbody>
    @foreach( $proveedores as $prov )

    <tr class="clickable_row" onclick="window.location.href = '{{ route('remitos', $prov->id) }}';">
      <td>{{ $prov->id }}</td>
      <td>{{ $prov->direccion }}</td>
      <td>{{ $prov->telefono }}</td>
      <td>{{ $prov->fecha_alta }}</td>
      <td>
        <a href="{{ route('editProveedor', $prov->id) }}">
          <img class="icon" src="images/edit.png" alt="edit"></td>
        </a>
      <td>
        <form action="{{ route('destroyProveedor', $prov->id) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="delete">
          <input class="icon" type="image" name="submit" src="images/delete.png" alt="delete">
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
