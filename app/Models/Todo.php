<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);


    }

    protected $guarded = [
        'id',
    ];
}
