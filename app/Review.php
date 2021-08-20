<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //relation with reviewer many to one relationship
    public function reviewer()
    {
        return $this->hasOne('App\User', 'reviewer_id', 'id');
    }
    
    //relation with case many to one relationship
    public function case()
    {
        return $this->hasOne('App\CityCase', 'case_id', 'id');
    }
}
