<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    public function authors(){
        return $this->belongsToMany("App\Author");
    }
}
