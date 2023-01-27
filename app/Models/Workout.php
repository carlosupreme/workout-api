<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
