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
            {{-- click to view blogs only from this author --}}
            <span> Author:
                <a href="/?author={{$blog['author']}}">{{$blog['author']}}</a>
            </span>

            {{-- click to view blogs only from this user --}}
            <span style="margin-left: 10px"> Posted by user:
                <a href="/?user_id={{$blog['user_id']}}">{{$blog['user_id']}}</a>
            </span>

            <span style="margin-left: 10px">Published: {{$blog['created_at']->diffForHumans()}}</span>

        </p>
    </div>
@endforeach

<div style="margin-top: 6px;">
    {{$blogs->links()}}
</div>
    
@endsection