<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page_Master extends Model
{
    protected $fillable = [
        'visible', 'redirected', 'redirect_url', 'route',
    ];

    protected $table="pages_master";

    public function pages(){
        return $this->hasOne('App\Page', 'page_master_id');
    }
}
