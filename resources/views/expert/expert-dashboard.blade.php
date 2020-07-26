@extends('layout.expertlayout')

@section('content')
<div class="card-header">Expert Dashboard</div>
@foreach($articles as $article)
    Article->title :{{ $article->title }}
@endforeach

@endsection
