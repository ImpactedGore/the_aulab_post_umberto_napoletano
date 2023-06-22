<x-layout>
    <h1>Dashboard Admin</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
    @endif

    <x-requests-table :roleRequests="$revisorRequests" role="revisor"/>
    <x-requests-table :roleRequests="$writerRequests" role="writer"/>

    <h3>I nostri tags</h3>
    <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
    <h3>Le nostre categorie</h3>
    <x-metainfo-table :metaInfos="$categories" metaType="categories"/>
    <h3>Crea nuova categorie</h3>
    <form action="{{route('admin.createCategory')}}" method="POST" class="d-flex">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Inserisci il nome della nuova categoria">
        <button type="submit" class="btn btn-primary" >Crea categoria</button>
    </form>
</x-layout>