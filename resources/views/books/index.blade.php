@extends('template')

@section('title', 'Books')

@section('content')
    <br>

    <div class="row">
        <div class="col-8"><h2>Books</h2></div>
        <div class="col-4 text-right"><a href="/books/create" class="btn btn-success">+ Add</a></div>
    </div>



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
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-success">Edit</a>

                        <form action="{{ route('books.destroy', $book->id)}}"
                              method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
