<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReview extends Model
{
    use HasFactory;
    protected $table = "carReview";

    protected $fillable=[
        'message',
        'score',
        'customer_id',
        'car_id',
    ];
    public function customer() {
        return $this->belongsTo(User::class);
    }
}
