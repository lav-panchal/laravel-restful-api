<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    // use HasFactory;
    public $timestamps=false;

    protected $table="_z_country";

    protected $fillable=[
        'iso', 
        'name', 
        'dname', 'iso3', 'numcode' , 'phonecode', 
        'position', 'created','register_by','modified','modified_by',
    ];
}
