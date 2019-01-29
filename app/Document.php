<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'detail_id', 'file', 'status', 'messages'
    ];

    /** Relation between document and user detail */
    public function user_details()
    { 
        return $this->belongsTo('App\UserDetail','detail_id'); /** detil_id is foreign key in this table */
    }
}
