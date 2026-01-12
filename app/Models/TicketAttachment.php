<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'message_id',
        'file_path',
        'file_name',
        'file_size',
        'mime_type',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    
    public function message(){
        return $this->belongsTo(TicketMessage::class);
    }
    
    protected static function boot(){
        parent::boot();

        static::creating(function ($attachment){
            if(!$attachment->uploaded_at){
                $attachment->uploaded_at = now();
            }
        });
    }

}
