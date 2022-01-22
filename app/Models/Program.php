<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function getFac()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
