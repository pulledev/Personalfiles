<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;
    protected string $unitName;
    protected string $color;

    protected $fillable = [
        'unitName',
        'color',
        'createdFromUser'
    ];
}
