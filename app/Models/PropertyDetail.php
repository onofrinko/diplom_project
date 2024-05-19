<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'property_details_id';
    public $timestamps = false;

    protected $fillable = [
        'property_name',
        'details',
        'property_type_id',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'property_type_id');
    }
}
