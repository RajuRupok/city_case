<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //relation with reviewer many to one relationship
    public function reviewer()
    {
        return $this->belongsTo('App\User', 'reviewer_id', 'id');
    }
    
    //relation with case many to one relationship
    public function case()
    {
        return $this->belongsTo('App\CityCase', 'case_id', 'id');
    }
}
