<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingLicenses extends Model
{
    use HasFactory;
    protected $table = "driving_licenses";

    protected $fillable=[
        'user_id',
        'license_number',
        'thumbnail_1',
        'thumbnail_2',
        'issue_date',
        'expiration_date',
    ];
}
