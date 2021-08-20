<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nid', 'mobile', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    


    // all relation below

    //relation with category many to one relationship
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    //relation with cases many to one relationship
    public function caseCitizens()
    {
        return $this->hasMany('App\CityCase', 'citizen_id', 'id');
    }

    //relation with support_staff many to one relationship
    public function caseSupportStaffs()
    {
        return $this->hasMany('App\CityCase', 'support_staff_id', 'id');
    }

    //relation with caseCategories many to one relationship
    public function caseCategories()
    {
        return $this->hasMany('App\CityCase', 'category_id', 'id');
    }

    //relation with review many to one relationship
    public function review()
    {
        return $this->hasOne('App\Review', 'reviewer_id', 'id');
    }
}
