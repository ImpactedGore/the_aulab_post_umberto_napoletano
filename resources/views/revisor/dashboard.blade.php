<x-layout>
    <h1>Revisor Dashboard</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
    @endif
    <h3>Articoli da revisionare</h3>
    <x-articles-table :articles="$pendingArticles"/>
    <br>
    <h3>Articoli accettati</h3>
    <x-articles-table :articles="$acceptedgArticles"/>
    <br>
    <h3>Articoli rifiutati</h3>
    <x-articles-table :articles="$rejectedArticles"/>
</x-layout>