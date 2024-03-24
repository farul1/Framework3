@extends('layouts.main')
@section('container')

@foreach ($blog as $blog)
<article class="mb-3">
<h2>{{ $blog["title"] }}</h2>
<h4>{{ $blog["author"] }}</h4>
<p>{{ $blog["body"] }}</p>
</article>
@endforeach

@endsection
