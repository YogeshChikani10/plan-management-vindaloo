<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComboPlan extends Model
{
    //
    use HasFactory;
    protected $table = 'combo_plans';

    protected $fillable = [
        'name',
        'price',
    ];

    public function plans() {
        return $this->belongsToMany( Plan::class, 'combo_plan_plan' );
    }
}
