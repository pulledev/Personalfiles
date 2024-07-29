<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected string $headline;
    protected string $text;
    protected int $fileId;
    protected int $typeId;

    protected $fillable = [
        'headline',
        'text',
        'fileId',
        'typeId'
    ];
}
