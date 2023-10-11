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
        'quantity_room',
        'price',
        'image1',
        'image2',
        'image3',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
