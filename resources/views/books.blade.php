<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Books</title>
</head>

<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8">
    <h1 align="center">Books</h1>
    <table align="center">
        <tr>
            @foreach($keys as $key)
                <th>
                    <a href="?sort_by={{$key}}&order=DESC&page={{$_GET['page'] ?? 1}}">
                        &uarr;
                    </a>
                    {{$key}}
                    <a href="?sort_by={{$key}}&order=ASC&page={{$_GET['page'] ?? 1}}">
                        &darr;
                    </a>
                </th>
            @endforeach
        </tr>
        @foreach($books as $book)
            <tr>
                @foreach($keys as $key)
                    <td>
                        @if($key == 'title')
                            <a href="/books/{{$book->id}}">
                                {{$book->$key}}
                            </a>
                        @else
                            {{$book->$key}}
                        @endif

                    </td>
                @endforeach

                <td>
                    <form action="/books/{{$book->id}}/delete" method="post">
                        @csrf
                        <input type="submit" value="Delete">
                    </form>
                </td>

                <td>
                    <a href="/books/{{$book->id}}/edit">
                        Edit
                    </a>
                </td>

            </tr>
        @endforeach

        -
    </table>
    <div class="pagination" style="display: flex; justify-content: center; align-content: center">

        <button>
            <a class="page-link" href="{{$books->previousPageUrl()}}">
                Previous
            </a>
        </button>

        <button>
            <a class="page-link" href="{{$books->nextPageUrl()}}">
                Next
            </a>
        </button>

    </div>

    <div style="display: flex; justify-content: center; align-content: center">
        <a href="/books/loadBook">
            Add Book
        </a>
    </div>
</div>
</body>
</html>




