<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col12">
            <div class="card text-center">
                <div class="card-header">
                    Redatto da: {{$article->user->name}}
                    @if ($article->category)
                    <a class="small text-muted" href="{{route('article.byCategory',['category'=>$article->category->id])}}" style="text-decoration: none">{{$article->category->name}}</a>
                    @else
                    <p class="small text-muted">Articolo senza categoria</p>
                    @endif 
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{$article->title}}</h4>
                    <h5 class="card-title">{{$article->subtitle}}</h5>
                    <p class="small text-muted">Tempo di lettura : {{$article->readDuration()}} min</p>
                    <img src="{{Storage::url($article->image)}}" alt="...">
                    <p class="card-text">{{$article->body}}</p>
                    <a href="{{route('article.index')}}" class="btn btn-primary">Torna indietro</a>
                    @if(Auth::user() && Auth::user()->is_revisor)
                    <hr>
                    <a href="{{route('revisor.acceptArticle',compact('article'))}}" class="btn btn-success text-white">Accetta articolo</a>
                    <a href="{{route('revisor.rejectArticle',compact('article'))}}" class="btn btn-danger text-white">Rifiuta articolo</a>
                    @endif
                </div>
                <div class="card-footer text-body-secondary">
                    {{$article->created_at->format('d/m/y')}}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>