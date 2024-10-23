<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false; // Disable timestamps

    protected $fillable = ['name', 'birthday', 'gender', 'mobile_number', 'status']; // Define fillable fields
}

