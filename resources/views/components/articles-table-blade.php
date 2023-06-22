<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titolo</th>
      <th scope="col">Sottotitolo</th>
      <th scope="col">Redattore</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($articles as $article)
        <tr>
        <th scope="row">{{$article->id}}</th>
        <td>{{$article->title}}</td>
        <td>{{$article->subtitle}}</td>
        <td>@{{$article->user->name}}</td>
        <td>
            @if(is_null($article->is_accepted))
                <a href="{{route('article.show',compact('article')}}" class="btn btn-info text-white">Leggi articolo</a>
                <a href="{{route('revisor.acceptArticle',compact('article'))}}" class="btn btn-success text-white">Accetta articolo</a>
                <a href="{{route('revisor.rejectArticle',compact('article'))}}" class="btn btn-danger text-white">Rifiuta articolo</a>
            @else
            <a href="{{route('revisor.undoArticle',compact('article'))}}" class="btn btn-info text-white">Riporta in revisione</a>
            @endif
        </td>
        </tr>
    @endforeach

  </tbody>
</table>