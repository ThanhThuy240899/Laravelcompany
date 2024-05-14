<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{ 
    use HasFactory;
    protected $table = 'candidates';

    protected $fillable = [
        'email', 'password', 'full_name', 'birth_date', 'phone', 'avatar', 'school', 'level', 'address', 'bio','job'
    ];

    protected $hidden = [
        'password'
    ];
}
