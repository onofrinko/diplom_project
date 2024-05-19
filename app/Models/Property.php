<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $primaryKey = 'property_id';
    public $timestamps = false;

    protected $fillable = [
        'lendlord_id',
        'cost',
        'total_area',
        'pub_date',
        'property_status',
        'property_type_id',
        'property_details',
    ];

    protected $casts = [
        'property_details' => 'array',
        'pub_date' => 'date',
    ];

    public function lendlord()
    {
        return $this->belongsTo(Lendlord::class, 'lendlord_id', 'lendlord_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'property_type_id');
    }
}
