<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Edit Author</title>
</head>
<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8">
    <h1 align="center">Edit Author {{$id}}</h1>
    <form action="/authors/{{$id}}/save" method="post" >
        @csrf
        <label for="Name">
            Name:
        </label>
        <input type="text" id="name" name="name"><br>
        <input type="submit">
    </form>
</div>
</body>
</html>
