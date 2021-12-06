@extends('template')

@section('title', 'Authors')

@section('content')
    <br>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item">New</li>
    </ul>

    <div class="row">
        <div class="col-8"><h2>New author</h2></div>
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

            <form method="post" action="{{ route('authors.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Author Full Name:</label>
                    <input type="text" class="form-control" name="name" id="name" />
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <br>
@stop
