<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'food_code', 'food_name'
    ];

    public function facts() 
    {
        return $this->belongsToMany(Fact::class, 'food_facts');
    }
}
