@extends('layout')

@section('content')

{{-- only owner of current blog can edit or delete --}}
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
<h2>
    {{$blog['name']}}
</h2>
<h4>
    By: {{$blog['author']}}
</h4>
<p> posted:
    {{$blog['created_at']}}
</p>
<p> last edited:
    {{$blog['updated_at']}}
</p>
<p>
    {{$blog['text']}}
</p>

@endsection