@extends('layout')

@section('content')

{{-- <h1>manage my blogs</h1> --}}

<div id="root"></div>

@if (count($blogs) == 0)
    <p>No Blogs Found</p>
@endif

@foreach ($blogs as $blog)
    <div style="border: 1px solid black; margin-bottom: 20px">
        <h2>
            <a href="/blogs/{{$blog['id']}}">{{$blog['name']}}</a>
        </h2>
        <p>
            {{-- click to view blogs only from this author --}}
            <a href="/?author={{$blog['author']}}">{{$blog['author']}}</a>
        </p>
        {{-- link to update form --}}
        <a href="/blogs/{{$blog->id}}/edit">edit blog</a>

        {{-- form to delete blog --}}
        <form action="/blogs/{{$blog->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button style="background-color: red;">delete blog</button>
        </form>
    </div>
@endforeach
    
@endsection