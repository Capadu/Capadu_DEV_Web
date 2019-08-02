<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Api_Token extends Model
{
    protected $fillable = [
        'connection_token',
    ];

    protected $table="user_api_tokens";

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
