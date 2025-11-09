<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    protected $fillable = [
        'name','vehicle_type','distance','electric_source','electric_usage',
        'beef','chicken','organic_waste','inorganic_waste',
        'transport_emission','electric_emission','food_emission','rubbish_emission','total_emission'
    ];
}
