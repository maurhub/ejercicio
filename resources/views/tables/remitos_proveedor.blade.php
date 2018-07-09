<table class="table table-striped">

  <thead class="table-header text-white bg-dark">
    <tr>
      <th scope="col">Número de remito</th>
      <th scope="col">Fecha de emisión</th>
      <th scope="col">Monto total</th>
      <th scope="col">Proveedor</th>
      <th scope="col" colspan="2">
        <a href="{{ route('createRemito') }}">
          <img class="icon" src="{{ URL::to('/') }}/images/add.png" alt="add">
        </a>
      </th>
    </tr>
  </thead>

  <tbody>
    @foreach( $remitos as $rem )

    <tr>
      <td>{{ $rem->id }}</td>
      <td>{{ $rem->fecha_emision }}</td>
      <td>{{ $rem->monto_total }}</td>
      <td>{{ $rem->proveedor_id }}</td>
      <td>
        <a href="{{ route('editRemito', $rem->id) }}">
          <img class="icon" src="{{ URL::to('/') }}/images/edit.png" alt="edit"></td>
        </a>
      <td>
        <form action="{{ route('destroyRemito', $rem->id) }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" name="proveedor_id" value="{{ $rem->proveedor_id }}">
          <input class="icon" type="image" name="submit" src="{{ URL::to('/') }}/images/delete.png" alt="delete">
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
