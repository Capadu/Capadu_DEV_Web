<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nume', 'unitate_de_invatamant', 'email', 'password',
    ];

    protected $table="users";

    public function pagemaster(){
        return $this->hasOne('App\Page_Master', 'user_id');
    }

    public function filestorage(){
        return $this->hasOne('App\File_Storage', 'user_id');
    }

    public function tokens(){
        return $this->hasOne('App\User_Api_Token', 'user_id');
    }
}
