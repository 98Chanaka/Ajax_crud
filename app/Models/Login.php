<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Login extends Authenticatable
{
    use HasFactory;

    protected $table = 'logins'; // Specify the table name
    protected $primaryKey = 'id'; // Primary key
    protected $fillable = [
        'username',
        'usertype',
        'password',
    ];

    // Mutator to hash the password before saving it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
