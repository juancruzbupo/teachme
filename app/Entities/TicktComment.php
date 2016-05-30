<?php

namespace TeachMe\Entities;

//use Illuminate\Database\Eloquent\Model;

class TicktComment extends Entity
{
    protected $table = "ticket_comments";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'comment', 'link',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::getClass());    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
