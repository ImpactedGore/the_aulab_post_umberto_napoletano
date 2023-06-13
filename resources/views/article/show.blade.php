<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col12">
            <div class="card text-center">
                <div class="card-header">
                    {{$article->user->name}}
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{$article->title}}</h4>
                    <h5 class="card-title">{{$article->subtitle}}</h5>
                    <img src="{{Storage::url($article->image)}}" alt="...">
                    <p class="card-text">{{$article->body}}</p>
                    <a href="{{route('article.index')}}" class="btn btn-primary">Torna indietro</a>
                </div>
                <div class="card-footer text-body-secondary">
                    {{$article->created_at->format('d/m/y')}}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>