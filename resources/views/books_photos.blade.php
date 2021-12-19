<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Book's Photos</title>
</head>


<body>
<div style="text-align: center">
    <h1>Book's Photos</h1>

    <div>
        <ul>
            @foreach($photos as $photo)

                <li>
                    <img src="{{ asset($photo['path']) }}" alt="{{ $photo['path'] }} not found.">
                    <br>
                    <div>
                        <p>
                            {{$photo['description']}}
                        </p>
                    </div>
                    <br>
                </li>

            @endforeach
        </ul>
    </div>

    <div style="display: flex; justify-content: center; align-content: center; padding-top: 10px;">
        <button>
            <a href="/books/{{$book_id}}">
                Go Back to the book's details
            </a>
        </button>
    </div>



</div>

</body>
</html>

