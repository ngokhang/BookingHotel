<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'hotel_user';

    public function scopeCheckedIn($query)
    {
        return $query->where('deleted_at', null)->get();
    }
}
