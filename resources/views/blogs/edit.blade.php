<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update blog</title>
</head>
<body>
    @auth
    <span>logged as <strong>{{auth()->user()->name}}</strong></span>
    <a href="/blogs/manage">my blogs</a>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" style="background-color: red;">
            logout
        </button>
    </form>
    @endauth
    
    <h1>edit blog</h1>
    <form action="/blogs/{{$blog->id}}" method="POST">
        @csrf
        @method('PUT')
        <input
         type="text"
         name="name"
         placeholder="name"
         value="{{$blog->name}}"
        >
        @error('name')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br>

        <input
         type="text"
         name="author"
         placeholder="author"
         value="{{$blog->author}}"
        >
        @error('author')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br>

        <input
         type="text"
         name="text"
         placeholder="description"
         value="{{$blog->text}}"
        >
        @error('text')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <button type="submit">update</button>
    </form>
</body>
</html>