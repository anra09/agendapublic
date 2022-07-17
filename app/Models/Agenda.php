<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }

    protected $guarded = [
        'id',
    ];
}
