<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create blog</title>
</head>
<body>
    <form action="/blogs" method="POST">
        @csrf

        <input
         type="text"
         name="name"
         placeholder="name"
         value="{{old('name')}}"
        >
        @error('name')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br>

        <input
         type="text"
         name="author"
         placeholder="author"
         value="{{old('author')}}"
        >
        @error('author')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br>

        <input
         type="text"
         name="text"
         placeholder="description"
         value="{{old('text')}}"
        >
        @error('text')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <button type="submit">upload</button>
    </form>
</body>
</html>