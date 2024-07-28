<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranks extends Model
{
    use HasFactory;
    protected string $rankName;
    protected string $color = "white";
    //protected int $createdFromUser;

    protected $fillable = [
        'rankName',
        'color',
        'createdFromUser'
    ];
}

