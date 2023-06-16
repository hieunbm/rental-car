<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsQuery extends Model
{
    use HasFactory;
    protected $table = "contactusquery";

    protected $fillable=[
        'user_id',
        'name',
        'email',
        'phone',
        'message',
        'status',
    ];

    public function rental(){
        return $this->belongsToMany(Rental::class, "rental_contact");
    }
}
