<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lendlord extends Model
{
    use HasFactory;

    protected $primaryKey = 'lendlord_id';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'lendlord_id', 'lendlord_id');
    }
}
