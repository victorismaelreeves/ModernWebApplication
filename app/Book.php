<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author_id'
    ];

    public static function detailedList($limit = null)
    {
        $result = Book::leftJoin(
            'authors',
            'authors.id',
            '=',
            'books.author_id')
            ->orderBy('id', 'desc');

        if ($limit !== null) {
            $result->limit($limit);
        }

        return $result->get([
            'books.id',
            'books.title',
            'books.author_id',
            'authors.full_name'
        ]);
    }
}
