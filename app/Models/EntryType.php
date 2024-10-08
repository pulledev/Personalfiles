<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryType extends Model
{
    use HasFactory;
    protected string $entryName;
    protected string $color;
    protected $fillable = [
        'entryName',
        'color'
    ];
}
