<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'request' => 'required',
        ]);

        $requestString = $request->get('request');
        $searchBy = request('search_by', $default = 'book');
        $parts = explode(' ', $requestString, 6);

        if ($searchBy == 'book') {
            $fieldName = 'title';
            $model = Book::class;
        } else {
            $fieldName = 'full_name';
            $model = Author::class;
        }

        $results = $model::where(
            $fieldName,
            'LIKE',
            trim($requestString)
        );

        foreach ($parts as $requestPart) {
            $results->orWhere(
                $fieldName,
                'LIKE',
                trim('%' . $requestPart . '%')
            );
        }

        return $results->get();
    }
}
