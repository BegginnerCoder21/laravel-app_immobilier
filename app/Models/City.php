<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    use Translatable;

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

    public function getActive()
    {
        return $this->is_active == 0 ? 'Inactive' : 'Active';
    }

}
