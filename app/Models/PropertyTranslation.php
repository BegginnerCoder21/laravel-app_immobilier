<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTranslation extends Model
{
    use HasFactory;

    protected $fillable = [       
        'name',
        'building_age',
        'parking',
        'cooling',
        'heating',
        'sewer',
        'water',
        'torage_room',
        'exercise_room',
        'description',
    ];

    public $timestamps =false;
}
