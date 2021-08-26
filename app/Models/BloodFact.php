<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodFact extends Model
{
    use HasFactory;

    protected $table = 'bloods_fact';

    protected $fillable = [
        'blood_type'
    ];
}
