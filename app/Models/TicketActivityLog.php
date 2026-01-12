<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketActivityLog extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'action',
        'performed_by',
        'old_value',
        'new_value',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'old_value' => 'array',
        'new_value' => 'array',
    ];


    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function performer(){
        return $this->belongsTo(User::class, 'performed_by');
    }

    protected static function boot(){
        parent::boot();

        static::creating(function ($log){
            if(!$log->created_at){
                $log->created_at = now();
            }
        });
    }
}
