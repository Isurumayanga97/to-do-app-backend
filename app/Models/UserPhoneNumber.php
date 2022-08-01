<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPhoneNumber extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $table = "user_phone_numbers";

    protected $fillable = [
        'phone_number', 'fk_userid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
