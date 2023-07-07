<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = "rental";

    protected $fillable=[
        'user_id',
        'car_id',
        'rental_date',
        'return_date',
        'expected',
        'pickup_location',
        'message',
        'address',
        'email',
        'telephone',
        'rental_type',
        'car_price',
        'desposit_type',
        'desposit_amount',
        'additional_fee',
        'total_amount',
        'status',
        'payment_method',
        'is_rent_paid',
        'is_desposit_paid',
        'is_car_returned',
        'is_desposit_returned',
        'is_reviewed',
    ];
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function customer(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function incident(){
        return $this->hasMany(Incident::class);
    }
    public function service(){
        return $this->belongsToMany(Service::class, "rental_service")->withPivot('price');
    }
}
