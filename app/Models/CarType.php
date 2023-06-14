<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "carTypes";

    protected $fillable=[
        'name',
        'slug',
        'icon',
        'description'
    ];
    public function car(){
        return $this->hasMany(Car::class);
    }
}
