<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityCase extends Model
{
    // all relation are below

    //relation with User one to many relationship
    public function citizen(){
        return $this->belongsTo('App\User', 'citizen_id', 'id');
    }

    //relation with User one to many relationship
    public function support_staff(){
        return $this->belongsTo('App\User', 'support_staff_id', 'id');
    }

    //relation with User one to many relationship
    public function category(){
        return $this->belongsTo('App\User', 'category_id', 'id');
    }
    
    //relation with review many to one relationship
    public function review()
    {
        return $this->hasOne('App\Review', 'case_id', 'id');
    }
}
