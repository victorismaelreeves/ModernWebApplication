<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Author Details</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
</head>


<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8">
    <h1>Author Details</h1>

    <table>

        <thead>

        <tr>
            <td>id</td>
            <td>name</td>
        </tr>


        </thead>

        <tbody>
        <tr>
            <td>{{$author->id}}</td>
            <td>{{$author->name}}</td>
        </tr>
        </tbody>

    </table>

    <label for="Books">Books</label>
    <select name="books" id="books">
        @foreach($author->books as $book)
        <option value="{{$book['title']}}">
            {{$book['title']}}
        </option>
        @endforeach
    </select>
    <div style="display: flex; justify-content: center; align-content: center; padding-top: 10px;">
        <button>
            <a href="/authors/">
                Go Back to all Authors
            </a>
        </button>
    </div>

</div>

</body>
</html>



