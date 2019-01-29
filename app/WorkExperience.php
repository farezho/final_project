<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
        'detail_id', 'company_name', 'job_location_city', 'position', 'start_month', 'start_year', 'end_month', 'end_year', 'job_desc'
    ];

    /** Relation between educational background and user detail */
    public function user_details()
    { 
        return $this->belongsTo('App\UserDetail','detail_id'); /** detil_id is foreign key in this table */
    }
}
