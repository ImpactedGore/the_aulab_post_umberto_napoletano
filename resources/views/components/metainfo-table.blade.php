<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome Tag</th>
      <th scope="col">Q.ta articoli collegati</th>
      <th scope="col">Aggiorna</th>
      <th scope="col">Elimina</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($metaInfos as $metaInfo)
        <tr>
        <th scope="row">{{$metaInfo->id}}</th>
        <td>{{$metaInfo->name}}</td>
        <td>{{count($metaInfo->articles)}}</td>

        @if($metaType=='tags')
        <td>
            <form action="{{route('admin.editTag',['tag'=>$metaInfo])}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="name" placeholder="Inserisci nuovo nome tag">
                <button type="submit" class="btn btn-primary">Aggiorna tag</button>
            </form>
        </td>

        <td>
            <form action="{{route('admin.deleteTag',['tag'=>$metaInfo])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </td>
        @else
        <td>
            <form action="{{route('admin.editCategory',['category'=>$metaInfo])}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="name" placeholder="Inserisci nuovo nome categoria">
                <button type="submit" class="btn btn-primary">Aggiorna categoria</button>
            </form>
        </td>

        <td>
            <form action="{{route('admin.deleteCategory',['category'=>$metaInfo])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </td>

        @endif
    </tr>
    @endforeach

  </tbody>
</table>