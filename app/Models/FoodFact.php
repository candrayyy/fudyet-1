<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FoodFact extends Model
{
    use HasFactory;

    protected $table = 'food_facts';

    protected $fillable = [
        'food_id', 'fact_id'
    ];


    public static function getDataFoodFact()
    {
        return DB::table('food_facts')
                ->join('foods', function($join) {
                    $join->on('food_facts.food_id', '=', 'foods.id');
                });
    }
}
