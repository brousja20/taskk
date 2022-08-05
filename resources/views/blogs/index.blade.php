@extends('layout')

@section('content')

<h1>Browse blogs</h1>

@if (count($blogs) == 0)
    <p>No Blogs Found</p>
@endif

@foreach ($blogs as $blog)
    <div style="border: 1px solid black; margin-bottom: 20px">
        <h2>
            <a href="/blogs/{{$blog['id']}}">{{$blog['name']}}</a>
        </h2>
        <p>
            <a href=""></a> {{$blog['author']}}
        </p>
    </div>
@endforeach

<div style="margin-top: 6px;">
    {{$blogs->links()}}
</div>
    
@endsection