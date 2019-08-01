<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'route', 'content',
    ];

    protected $table="pages";

    public function master(){
        return $this->belongsTo('App\Page_Master', 'page_master_id');
    }
}
