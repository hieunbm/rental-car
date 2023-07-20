<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "cars";

    protected $fillable=[
        'name',
        'license_plate',
        'model',
        'price',
        'desposit',
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
        'seats',
        'status',
        'description',
        'rate',
    ];
    public function gallery() {
        return $this->hasMany(Gallery::class, "car_id");
    }
    public function reviewcar() {
        return $this->belongsTo(CarReview::class);
    }
    public function price() {
        return $this->hasMany(RentalRate::class, "car_id");
    }
    public function carType(){
        return $this->belongsTo(CarType::class,"carType_id");
    }
    public function brands(){
        return $this->belongsTo(Brand::class,"brand_id");
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(Gallery::class, 'car_id');
    }
}
