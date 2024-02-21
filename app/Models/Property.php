<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory,SoftDeletes,Translatable;

    protected $with = ['translations'];

    protected $fillable = [
        'city_id',
        'slug',
        'total_price',
        'price_meter',
        'location',
        'area',
        'rooms',
        'bedrooms',
        'bathrooms',
        'air_conditioning',
        'central_heating',
        'laundry_room',
        'gym',
        'alarm',
        'window_covering',
        'internet',
        'is_active'
    ];

    protected $casts = [
        'air_conditioning => boolean',
        'central_heating => boolean',
        'laundry_room => boolean',
        'gym => boolean',
        'alarm => boolean',
        'window_covering => boolean',
        'internet => boolean',
        'is_active => boolean'
    ];


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

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
