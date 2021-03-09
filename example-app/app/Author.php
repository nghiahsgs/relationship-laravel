<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
        'age', 'name', 'city'
    ];
    public function phone(){
        return $this->hasOne('App\Phone','author_id');
    }
    public function books(){
        return $this->hasMany('App\Book','author_id');
    }
    public function roles(){
        return $this->belongsToMany("App\Role");
    }
}
