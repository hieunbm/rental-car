<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $table = "incident";

    protected $fillable=[
        'title',
        'rental_id',
        'status',
        'description',
        'expense',
    ];
}
