<x-layout>
    <h1>Dashboard del writer</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
    @endif

    <h4>Articoli accettati</h4>
    <x-writer-articles-table :articles="$acceptedArticles"/>

    <h4>Articoli rifiutati</h4>
    <x-writer-articles-table :articles="$rejectedArticles"/>

    <h4>Articoli in fase di revisione</h4>
    <x-writer-articles-table :articles="$unrevisionedArticles"/>
</x-layout>