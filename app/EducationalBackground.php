<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $fillable = [
        'detail_id', 'degree', 'institution_name', 'major', 'start_year', 'completion_year', 'gpa'
    ];

    /** Relation between educational background and user detail */
    public function user_details()
    { 
        return $this->belongsTo('App\UserDetail','detail_id'); /** detil_id is foreign key in this table */
    }
}
