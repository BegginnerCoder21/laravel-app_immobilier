<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model implements TranslatableContract
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

    public function _parent()
    {

        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->translatedIn(app()->getLocale())->where('is_active',1);
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class);
    }
}
