<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptid extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'danger_level',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sightings()
    {
        return $this->hasMany(Sighting::class);
    }
}
