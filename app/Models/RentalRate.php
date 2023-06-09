<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalRate extends Model
{
    use HasFactory;
    protected $table = "rentalRate";

    protected $fillable=[
        'car_id',
        'rental_type',
        'price'
    ];
}
