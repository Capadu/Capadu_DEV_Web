<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nume', 'unitate_de_invatamant', 'email', 'password',
    ];

    protected $table="users";
}
