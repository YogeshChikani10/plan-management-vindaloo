<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    //
    use HasFactory;
    protected $table = 'plan';

    protected $fillable = [
        'name',
        'price',
    ];
}
