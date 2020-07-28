@extends('layout.expertlayout')

@section('content')


@foreach($articles as $article)
    Title :{{ $article->title }}
    <form method="post" action="/expert-viewarticle">

        @csrf
        <input type="hidden" name="article_id" value={{ $article->article_id }} />
        <button type="submit" class="btn-primary" onclick="">View <i class="fas fa-eye"></i> </button>

    </form>
    <br>
@endforeach
@endsection
