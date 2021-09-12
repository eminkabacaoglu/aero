<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerModel extends Model
{
    use HasFactory;

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class);
    }
}
