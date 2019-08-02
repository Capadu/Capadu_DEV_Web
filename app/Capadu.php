<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capadu extends Model
{
    protected $fillable = [
        'capadu_id', 'owned_by',
    ];

    protected $table="user_capadus";
}
