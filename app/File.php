<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_name', 'storrage_key', 'file_size',
    ];

    protected $table="files";
}
