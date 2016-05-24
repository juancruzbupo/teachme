<?php

namespace TeachMe\Entities;

//use Illuminate\Database\Eloquent\Model;

class TicketVote extends Entity
{
    protected $table = "ticket_votes";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ticket_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::getClass());    
    }

    public function user()
    {
        return $this->belongsTo(Ticket::getClass()::class);
    }
}
