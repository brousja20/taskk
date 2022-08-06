<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <h1>registration</h1>
    <form action="/users" method="POST">
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

        <br>
        <input
         type="password"
         name="password_confirmation"
         placeholder="password again"
         value="{{old('password_confirmation')}}"
        >

        @error('password_confirmation')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <button type="submit">register</button>
    </form>

    <br>
    <br>
    <a href="/login">login?</a>

</body>
</html>