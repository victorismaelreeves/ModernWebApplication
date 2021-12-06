<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.nav')

@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
@endif

<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            <form method="post" action="/search">
                @csrf
                <div class="input-group mb-1">
                    <input class="form-control border-secondary py-2"
                           name="request" type="search"
                           placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary"
                                type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="search_by" id="authors" value="author">
                    <label class="form-check-label small" for="authors">Author</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="search_by" id="books" value="book">
                    <label class="form-check-label small" for="books">Book</label>
                </div>
            </form>
        </div>
    </div>
</div>

@include('includes.content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Books 2019</p>
    </div>
</footer>

@include('includes.js')
</body>
</html>
