<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{

    public $timestamps = false;

    protected $fillable =[
        'name',
        'description',
    ];
    
    public function tickets(){
        return $this->hasMany(Ticket::class, 'category_id');
    }

}
