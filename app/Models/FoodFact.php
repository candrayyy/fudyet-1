<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodFact extends Model
{
    use HasFactory;

    protected $table = 'food_facts';

    protected $fillable = [
        'food_id', 'fact_id'
    ];
}
