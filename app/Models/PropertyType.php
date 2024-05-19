<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $primaryKey = 'property_type_id';
    public $timestamps = false;

    protected $fillable = [
        'type',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'property_type_id', 'property_type_id');
    }

    public function propertyDetails()
    {
        return $this->hasMany(PropertyDetail::class, 'property_type_id', 'property_type_id');
    }


}
