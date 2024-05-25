<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'firstname',
        'lastname',
        'birthdate',
        'year'
    ];

    public function assists(): HasMany
    {
        return $this->hasMany(Assist::class);
    }
}
