<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Authors</title>
</head>
<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8">
    <h1 align="center">Authors</h1>
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
        @foreach($authors as $author)
            <tr>
                @foreach($keys as $key)
                    <td>
                        @if($key == 'name')
                            <a href="/authors/{{$author->id}}">
                                {{$author->$key}}
                            </a>
                        @else
                            {{$author->$key}}
                        @endif

                    </td>
                @endforeach
                <td>
                    <form action="/authors/{{$author->id}}/delete" method="post">
                        @csrf
                        <input type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <a href="/authors/{{$author->id}}/edit">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pagination" style="display: flex; justify-content: center; align-content: center">
        <button>
            <a class="page-link" href="{{$authors->previousPageUrl()}}">
                Previous
            </a>
        </button>
        <button>
            <a class="page-link" href="{{$authors->nextPageUrl()}}">
                Next
            </a>
        </button>
    </div>

    <div style="display: flex; justify-content: center; align-content: center">
        <a href="/authors/loadAuthor">
            Add Author
        </a>
    </div>

</div>
</body>
</html>




