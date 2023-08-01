<x-layout>
    <div class="container-fluid p-5 bg-dark bg-gradient text-center text-white">
        <div class="row justify-content-center">
            <div class="display-1">
                <h1>The Aulab Post Umberto Napoletano</h1>
            </div>
        </div>
    </div>

    <div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach ($articles as $article)
            <div class="card" style="width: 18rem;">
                <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->subtitle}}</p>
                    <p class="small text-muted">Tempo di lettura : {{$article->readDuration()}} min</p>
                    <p class="small text-muted">Redatto da {{$article->user->name}}</p>
                    @if ($article->category)
                    <a class="small text-muted" href="{{route('article.byCategory',['category'=>$article->category->id])}}" style="text-decoration: none">{{$article->category->name}}</a>
                    @else
                    <p class="small text-muted">Articolo senza categoria</p>
                    @endif
                    <p class="small text-muted">
                        @foreach($article->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </p>
                    <p class="small text-muted">Il {{$article->created_at->format('d/m/y')}}</p>
                    <a href="{{route('article.show',compact('article'))}}" class="btn btn-primary">Leggi</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>