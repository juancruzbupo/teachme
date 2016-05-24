<?php

namespace TeachMe\Entities;

//use Illuminate\Database\Eloquent\Model;

class Ticket extends Entity
{
    protected $table = "tickets";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'status',
    ];

    public function getOpenAttribute()
    {
        return $this->status == 'open';
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(TicktComment::getClass());
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'ticket_votes');
    }
}
