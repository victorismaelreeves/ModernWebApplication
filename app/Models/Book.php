<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App/Models/Author', 'author_id');
    }

}

