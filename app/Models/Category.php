<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $with = ['translations'];

    protected $fillable = [
        'is_active',
        'slug',
        'parent_id',
    ];

    protected $translatedAttributes = ['name'];


    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

}
