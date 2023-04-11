<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitVehicles extends Model
{
    use HasFactory;

    // Remover
    protected $hidden = [
        'id_unit'
    ];

    public $timestamps = false;

    protected $table = 'unitvehicles';
}
