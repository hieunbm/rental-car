<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarStatuses extends Model
{
    use HasFactory;
    protected $table = "car_statuses";
    protected $fillable=[
        'rental_id',
        'note',
        'thumbnail_1',
        'thumbnail_2',
    ];
}
