<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    protected $fillable = [
        'phone','author_id'
    ];
    public function author(){
        return $this->belongsTo('App\Author','author_id');
    }
}
