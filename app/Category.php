<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    
    // all relation are below

    //relation with User one to many relationship
    public function users(){
        return $this->hasMany('App\User', 'category_id', 'id');
    }

    //relation with cases one to many relationship
    public function cases(){
        return $this->hasMany('App\CityCase', 'category_id', 'id');
    }
}
