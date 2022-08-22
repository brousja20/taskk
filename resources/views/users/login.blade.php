<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body>
    <h1>login</h1>
    <form action="/users/authenticate" method="POST">
        @csrf
        <input
         type="email"
         name="email"
         placeholder="email"
         value="{{old('email')}}"
        >

        @error('email')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <br>
        <input
         type="password"
         name="password"
         placeholder="password"
         value="{{old('password')}}"
        >

        @error('password')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <button type="submit">login</button>
    </form>

    <br>
    <br>
    <a href="/register">register?</a>

    <div id="root"></div>

</body>
</html>