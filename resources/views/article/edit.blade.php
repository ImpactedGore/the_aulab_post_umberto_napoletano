<x-layout>

    <form action="{{route('article.update', compact('article')}}" method="POST" class="m-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleInputTitle1" class="form-label">Titolo</label>
        <input type="text" name="title" value="{{$article->title}}" class="form-control  @error('title') is-invalid @enderror">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputSubtitle1" class="form-label">Sottotitolo</label>
        <input type="text" name="subtitle" value="{{$article->subtitle}}" class="form-control  @error('subtitle') is-invalid @enderror">
        @error('subtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputCategory1" class="form-label">Categoria</label>
        <select name="category" id="category"  class="form-control  @error('category') is-invalid @enderror">

            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($article->category && $article->category->id == $category->id) selected @endif>{{$category->name}}</option>
            @endforeach

        </select>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputImg1" class="form-label">Immagine</label>
        <img src="{{Storage::url($article->image)}}">
        <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputBody1" class="form-label">Corpo del testo : </label>
        <textarea name="body" cols="30" row="7" class="form-control  @error('body') is-invalid @enderror">{{$article->body}}</textarea>
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputBody1" class="form-label"> Tags : </label>
        <input type="text" name="tags" value="{{$article->tags->implode('name',',')}}" class="form-control">
        <span>Inserisci i tags separati da virgola</span>
    </div>   

    <button type= "submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>