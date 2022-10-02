@extends('layout')

@section('content')


@push('css')
    <link rel="stylesheet" type="text/css" href="resources/css/app.css">
@endpush

<h1>Browse blogs</h1>

@if (count($blogs) == 0)
    <p>No Blogs Found</p>
@endif

@foreach ($blogs as $blog)
    {{-- <div style="border: 1px solid black; margin-bottom: 20px">
        <h2>
            <a href="/blogs/{{$blog['id']}}">{{$blog['name']}}</a>
        </h2>
        <p> --}}
            {{-- click to view blogs only from this author --}}
            {{-- <span> Author:
                <a href="/?author={{$blog['author']}}">{{$blog['author']}}</a>
            </span> --}}

            {{-- click to view blogs only from this user --}}
            {{-- <span style="margin-left: 10px"> Posted by user:
                <a href="/?user_id={{$blog['user_id']}}">{{$blog['user_id']}}</a>
            </span> --}}

            {{-- <span style="margin-left: 10px">Published: {{$blog['created_at']->diffForHumans()}}</span>

        </p>
    </div> --}}

    <div class="blog-page">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5"><a href="/blogs/{{$blog['id']}}">{{$blog['name']}}</a></h3>
                        <ul class="meta">
                            <li><a href="/?author={{$blog['author']}}"><i class="zmdi zmdi-account col-blue"></i>Posted By: {{$blog['author']}}</a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                        </ul>
                        <p>{{$blog['text']}}</p>
                        <a href="/blogs/{{$blog['id']}}" title="read more" class="btn btn-round btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div style="margin-top: 6px;">
    {{$blogs->links()}}
    {{-- load more blogs with ajax instead of pagination --}}
</div>
    
@endsection