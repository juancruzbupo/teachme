<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

class TocktComment extends Model
{
    protected $table = "ticket_comments";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'link','user_id', 'ticket_id',
    ];
}
