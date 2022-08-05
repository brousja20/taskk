@extends('layout')


@section('content')
<h2>
    {{$blog['name']}}
</h2>
<h4>
    By: {{$blog['author']}}
</h4>
<p>
    {{$blog['text']}}
</p>

@endsection