<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllergyFact extends Model
{
    use HasFactory;

    protected $table = 'allergies_fact';

    protected $fillable = [
        'allergy_name'
    ];
}
