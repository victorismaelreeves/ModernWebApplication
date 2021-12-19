<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Book Details</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
    <script src="{{asset('attach_file.js')}}"></script>

</head>
<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8">
    <h1>Book Details</h1>
    <table>
        <thead>
        <tr>
            @foreach($keys as $key)
                <td>
                    {{$key}}
                </td>
            @endforeach
        </tr>


        </thead>

        <tbody>
        <tr>
            @foreach($keys as $key)
                <td>
                    {{$book[$key]}}
                </td>
            @endforeach
        </tr>
        </tbody>
    </table>

    <div style="display: flex; justify-content: center; align-content: center; padding-top: 10px;">
        <button>
            <a href="/books/">
                Go Back to All Books
            </a>
        </button>
    </div>

    <br>

    <div style="display: flex; justify-content: center; align-content: center; padding-top: 10px;">
        <button>
            <a href="/books/{{$book['id']}}/photos">
                See photos related to the book
            </a>
        </button>
    </div>

    <br>

    <div style="display: flex; justify-content: center;">
        <form action="/books/{{$book['id']}}/add_files" method="post" enctype="multipart/form-data">
            @csrf
            <input type = "button" value="Add File" onclick="attach_file()" id="button_attach_file">
            <input type="submit">
        </form>


    </div>



</div>

</body>
</html>


