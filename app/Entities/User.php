<?php

namespace TeachMe\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = "users";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::getClass());
    }

    public function voted()
    {
        return $this->belongsToMany(Ticket::getClass(), 'ticket_votes')->withTimestamps();
    }

    public function hasVoted(Ticket $ticket)
    {
        return $this->voted()->where('ticket_id',$ticket->id)->count();
        //return TicketVote::where(['user_id' = $this->id, 'ticket_id' = $ticket->id])->count();
    }

    public function vote(Ticket $ticket)
    {
        if($this->hasVoted($ticket))
        {
            return false;
        }

        $this->voted()->attach($ticket);

        return true;
    }

    public function unvote(Ticket $ticket)
    {
        
        $this->voted()->detach($ticket);

        return true;
    }
}
