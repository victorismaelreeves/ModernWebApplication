<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::detailedList();

        return view('books.index', ['books' => $books]);
    }

    /**
     * Display the home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $books = $books = Book::detailedList(6);

        $authors = Author::orderBy('id', 'desc')->limit(3)->get();

        return view('home', [
            'books' => $books,
            'authors' => $authors
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('id', 'desc')->get();

        return view('books.form', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=> 'required|integer',
        ]);
        $book = new Book([
            'title' => $request->get('title'),
            'author_id'=> $request->get('author'),
        ]);
        $book->save();
        return redirect('/books')->with('success', 'Book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::orderBy('id', 'desc')->get();

        return view(
            'books.form_edit',
            [
                'book' => $book,
                'authors' => $authors
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'author' => 'required|integer',
        ]);

        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->author_id = $request->get('author');
        $book->save();

        return redirect('/books')->with('success', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book has been deleted');
    }
}
