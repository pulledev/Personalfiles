<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Files extends Model
{
    use HasFactory;
    protected string $name;
    protected int $rankId;
    protected int $unitId;
    protected bool $isStab;
    protected $fillable = [
        'name',
        'rankId',
        'unitId',
        'isStab',
        'createdFromUser'
    ];

}
