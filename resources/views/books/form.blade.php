@extends('template')

@section('title', 'Books')

@section('content')
    <br>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item">New</li>
    </ul>

    <div class="row">
        <div class="col-8"><h2>New book</h2></div>
    </div>

    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('books.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="title">Book Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $title }}" />
                </div>
                <div class="form-group">
                    <label for="authors">Authors:</label>
                    <select class="form-control" name="author" id="authors">
                        <option></option>

                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <br>
@stop
