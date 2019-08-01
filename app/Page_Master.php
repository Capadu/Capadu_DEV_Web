<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page_Master extends Model
{
    protected $fillable = [
        'visible', 'redirected', 'redirect_url', 'route',
    ];

    protected $table="pages_master";
}
