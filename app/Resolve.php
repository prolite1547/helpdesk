<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolve extends Model
{
    protected $fillable = [
        'ticket_id',
        'resolved_by'
    ];

    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }
}
