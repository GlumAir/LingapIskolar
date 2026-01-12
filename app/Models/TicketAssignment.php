<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketAssignment extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'agent_id',
        'assigned_at',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }
    
    protected static function boot(){
        parent::boot();

        static::creating(function ($assignment){
            if(!$assignment->assigned_at){
                $assignment->assigned_at = now();
            }
        });
    }


}
