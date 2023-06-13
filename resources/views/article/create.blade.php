<x-layout>

    <form action="{{route('article.store')}}" method="POST" class="m-5" enctype="multipart/form-data">
        @csrf

    <div class="mb-3">
        <label for="exampleInputTitle1" class="form-label">Titolo</label>
        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputSubtitle1" class="form-label">Sottotitolo</label>
        <input type="text" name="subtitle" class="form-control  @error('subtitle') is-invalid @enderror">
        @error('subtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputCategory1" class="form-label">Categoria</label>
        <select name="category" id="category" class="form-control  @error('category') is-invalid @enderror">

            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputImg1" class="form-label">Immagine</label>
        <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputBody1" class="form-label">Corpo del testo : </label>
        <textarea name="body" cols="30" row="7" class="form-control  @error('body') is-invalid @enderror"></textarea>
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-layout>