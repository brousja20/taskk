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