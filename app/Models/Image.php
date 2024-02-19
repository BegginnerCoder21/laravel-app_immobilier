<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'photo',
        'created_at',
        'updated_at'
    ];

    public function properties(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
    
}
