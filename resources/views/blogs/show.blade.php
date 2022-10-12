@extends('layout')

@section('content')

{{-- only owner of current blog can see edit or delete option --}}
@if ($blog->user_id == auth()->id())
    {{-- link to update form --}}
    <a href="/blogs/{{$blog->id}}/edit">edit blog</a>
    
    {{-- form to delete blog --}}
    <form action="/blogs/{{$blog->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button style="background-color: red;">delete blog</button>
    </form>

@endif

{{-- html for single blog --}}
<p> posted:
    {{$blog['created_at']}}
</p>
<p> last edited:
    {{$blog['updated_at']}}
</p>
<h2>
    Name: {{$blog['name']}}
</h2>
<h4>
    By: {{$blog['author']}}
</h4>
<p>
    Description: {{$blog['text']}}
</p>

<br>
<h3>comments</h3>
<div>
    <form action="/blogs/{{ $blog->id }}/comments" method="POST">
        @csrf

        <label for="text">Add comment</label>
        <textarea name="text"></textarea>

        <input type="hidden" name="parent_id" value="NULL">

        <button type="submit">comment as <strong>{{ auth()->user()->name }}</strong></button>
    </form>
</div>
<br>
<br>
<br>
@foreach ($comments as $comment)
    <p style="display: inline"><strong>{{$comment->user['name']}}: </strong>{{ $comment->text }}</p>

    <form action="/blogs/{{ $blog->id }}/comments" method="POST" style="display: inline">
        @csrf

        <textarea name="text"></textarea>

        <input type="hidden" name="parent_id" value="{{ $comment->id }}">

        <button type="submit">reply</button>
    </form>

    @if ($comment->user_id == auth()->id())
        <form action="/comments/{{ $comment->id }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')

            <button style="background-color: red" type="submit">delete</button>
        </form>
    @endif
    
    @foreach ($comment->replies as $reply)
        <br>
        <p style="margin-left: 18px; display: inline">->{{$reply->user['name']}}: {{$reply->text}} </p>

        <form action="/blogs/{{ $blog->id }}/comments" method="POST" style="display: inline">
            @csrf
    
            <textarea name="text"></textarea>
    
            <input type="hidden" name="parent_id" value="{{ $reply->id }}">
    
            <button type="submit">reply</button>
        </form>

        @if ($reply->user_id == auth()->id())
            <form action="/comments/{{ $reply->id }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')

                <button style="background-color: red" type="submit">delete</button>
            </form>
        @endif

        @foreach ($reply->replies as $reply)
            <br>
            <p style="margin-left: 50px; display: inline"">->{{$reply->user['name']}}: {{$reply->text}} </p>

            <form action="/blogs/{{ $blog->id }}/comments" method="POST" style="display: inline">
                @csrf
        
                <textarea name="text"></textarea>
        
                <input type="hidden" name="parent_id" value="{{ $reply->id }}">
        
                <button type="submit">reply</button>
            </form>

            @if ($reply->user_id == auth()->id())
                <form action="/comments/{{ $reply->id }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')

                    <button style="background-color: red" type="submit">delete</button>
                </form>
            @endif

        @endforeach

    @endforeach
    <br>
    <br>
@endforeach

@endsection