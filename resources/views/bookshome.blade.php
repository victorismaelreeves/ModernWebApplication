@extends('template')

@section('title', 'Home')

@section('content')
    <br>

    <h2>New Books</h2>

    <div class="row">

        @foreach ($books as $book)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">{{ $book->title }}</h4>
                    <img class="card-img-top" src="http://placehold.it/700x400">
                    <div class="card-body">
                        <p class="card-text">By {{ $book->full_name }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/books/{{ $book->id }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2>New Authors</h2>

    <div class="row">
        @foreach ($authors as $author)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">{{ $author->full_name }}</h4>
                    <div class="card-body">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                    </div>
                    <div class="card-footer">
                        <a href="authors/{{ $author->id }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
