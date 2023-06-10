<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";

    protected $fillable=[
        'name',
        'license_plate',
        'model',
        'slug',
        'brand_id',
        'carType_id',
        'thumbnail',
        'fuelType',
        'transmission',
        'km_limit',
        'modelYear',
        'reverse_sensor',
        'airConditioner',
        'driverAirbag',
        'cDPlayer',
        'brakeAssist',
        'status',
        'description',
        'rate',
    ];
    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }
    public function reviewcar() {
        return $this->belongsTo(CarReview::class);
    }
    public function price() {
        return $this->belongsTo(RentalRate::class);
    }
}
