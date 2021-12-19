<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Collection;
use Psy\TabCompletion\AutoCompleter;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class BookController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $sort_by = $request->input('sort_by', 'id');
        $order = $request->input('order', 'ASC');
        $paginate = $request->input('paginate', 5);
        $books = Book::leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->select(['books.id', 'books.title', 'books.pages', 'authors.name as author_name'])
            ->orderBy($sort_by, $order)
            ->paginate($paginate);

        return view('books', ['books' => $books, 'keys' => ['id', 'title', 'pages', 'author_name']]);
    }

    public function get(int $id)
    {
        $book = Book::findOrFail($id);
        $book->author_name = $book->author->name;
        $book = $book->makeHidden('author')->toArray();
        return view('book_details', ['book' => $book, 'keys' => ['id', 'title', 'pages', 'author_name']]);
    }

    public function save(Request $request, int $id = null)
    {
        $fields = $request->toArray();
        if(isset($fields['_token'])){
            unset($fields['_token']);
        }

        if($id === null){
            $book = Book::factory()->create($fields);
        } else{
            $book = Book::findOrFail($id);
            foreach ($fields as $key => $val){
                $book->$key = $val;
            }
            $book->save();
        }

        return redirect()->action(
            [BookController::class, 'get'], ['id' => $book->id]
        );
    }

    public function delete(int $id)
    {
        $book = Book::findOrFail($id);

        $book->photos()->delete();
        $book->delete();

        return redirect()->action([BookController::class, 'index']);
    }

    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        $authors = AuthorController::getAll();
        return view('edit_book', ['id' => $id, 'title' => $book->title, 'pages' => $book->pages, 'author_id' => $book->author_id, 'authors' => $authors]);
    }

    public function loadBook()
    {
        $authors = AuthorController::getAll();
        return view('load_book', ['authors' => $authors]);
    }

    public function get_photos(int $id)
    {
        $book = Book::findOrFail($id);
        $photos = $book->photos->toArray();
        return view('books_photos', ['photos' => $photos, 'book_id' => $id]);
    }



}
