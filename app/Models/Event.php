<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'finish_date',
        'group_id',
        'creator_id',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'id_group');
    }
}
