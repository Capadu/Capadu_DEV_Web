<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_Storage extends Model
{
    protected $fillable = [
        'total_space', 'available_space', 'used_space',
    ];

    protected $table="files_storage";

    public function files(){
        return $this->hasMany('App\File', 'files_storage_id');
    }
}
