<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'country',
        'distance',
        'description',
        'check_in_date',
        'price',
        'quantity_room',
        'image1',
        'image2',
        'image3',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
