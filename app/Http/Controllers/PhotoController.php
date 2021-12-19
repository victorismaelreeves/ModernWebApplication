<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function add_files(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $number_files = count($request->image_files);

        for($i = 0; $i < $number_files; $i++) {

            $file = $request->image_files[$i];
            $description = $request->descriptions[$i];

            $name = $file->hashName();
            $file->storeAs('public/images', $name);
            $path = 'storage/images/' . $name;

            Photo::create([
                'path' => $path,
                'description' => $description,
                'book_id' => $book->id
            ]);

        }

        return redirect()->action(
            [BookController::class, 'get'], ['id' => $book->id]
        );

    }
}
