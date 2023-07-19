<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "incident";

    protected $fillable=[
        'title',
        'rental_id',
        'thumbnail',
        'description',
        'expense',
    ];
}
