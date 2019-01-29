<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'gender', 'birthday_place', 'birthday_date', 'phone_number', 'address'
    ];

    /** Relation between user detail and user */
    public function users()
    { 
        return $this->belongsTo(User::class);
    }

    /** Relation between user detail and educational background */
    public function edu_backgrounds()
    { 
        return $this->hasMany('App\EducationalBackground','detail_id'); /** id is primary key in this table */
    }

    /** Relation between user detail and work experience */
    public function work_experience()
    { 
        return $this->hasMany('App\WorkExperience', 'detail_id');
    }

    /** Relation between user detail and work experience */
    public function document()
    { 
        return $this->hasOne('App\Document','id');
    }
}
