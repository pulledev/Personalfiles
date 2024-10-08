<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationType extends Model
{
    use HasFactory;

    protected string $name;
    protected string $educationDescription;

    protected $fillable = [
        'educationName',
        'level',
        'educationDescription',
        'createdFromUser',
    ];

}
