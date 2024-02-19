<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory,SoftDeletes,Translatable;


    protected $translatedAttributes = [
        'building_age',
        'name',
        'description',
        'cooling',
        'parking',
        'heating',
        'sewer',
        'water',
        'torage_room',
        'exercise_room'
    ];

    public function getActive()
    {
        return  $this -> is_active  == 1 ? 'Inactive':'Active' ;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public function getDateFormatedAttribute()
    {
        return $this->form_date->format('d.m.Y');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
