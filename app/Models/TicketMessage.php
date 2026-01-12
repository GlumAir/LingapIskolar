<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TicketMessage extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'ticket_id',
        'sender_id',
        'message',
        'is_internal',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'is_internal' => 'boolean',
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function attachments(){
        return $this->hasMany(TicketAttachment::class, 'message_id');
    }

    //RBAC scope - this hides internal notes from regular users 
    public function scopeVisibleTo(Builder $query, User $user){

        // Admins, managers, and agents can see all messages
        if($user->isAdmin() || $user->isManager() || $user->isAgent()){
            return $query;
        }

        //Regular users can only see public messages
        return $query->where('is_internal, false');

    }

    protected static function boot(){
        parent::boot();

        static::creating(function ($message){
            if(!$message->created_at){
                $message->created_at = now();
            }
        });
    }
}
