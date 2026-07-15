<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sighting extends Model
{
    use HasFactory;

    protected $fillable = [
        'cryptid_id',
        'user_id',
        'location',
        'sighting_date',
        'kronologi',
    ];

    protected $casts = [
        'sighting_date' => 'date',
    ];

    public function cryptid()
    {
        return $this->belongsTo(Cryptid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
