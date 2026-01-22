<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ["name", "email", "password"];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
        ];
    }

    // Relationships

    // Tickets created by this user (as ticket creator)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Tickets assigned to this user (as agent)
    public function assignedTickets()
    {
        return $this->hasManyThrough(
            Ticket::class,
            TicketAssignment::class,
            "agent_id",
            "id",
            "id",
            "ticket_id",
        );
    }

    public function ticketAssignments()
    {
        return $this->hasMany(TicketAssignment::class, "agent_id");
    }

    public function ticketMessages()
    {
        return $this->hasMany(TicketMessage::class, "sender_id");
    }

    public function activityLogs()
    {
        return $this->hasMany(TicketActivityLog::class, "performed_by");
    }

    // Helper Methods

    public function isAdmin()
    {
        return $this->hasRole("admin");
    }

    public function isManager()
    {
        return $this->hasRole("support-manager");
    }

    public function isAgent()
    {
        return $this->hasRole("agent");
    }

    public function isUser()
    {
        return $this->hasRole("user");
    }

    public function scopeSearch($query, $search)
    {
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }
    }



}