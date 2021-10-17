<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    use HasFactory;
    protected $table = 'fee_ships';
    public $timestamps = false;
    protected $fillable = ['matp', 'maqh', 'xaid', 'fee'];

    public function city(){
        return $this->belongsTo(City::class, 'matp');
    }
    public function province(){
        return $this->belongsTo(Province::class, 'maqh');
    }
    public function ward(){
        return $this->belongsTo(Ward::class, 'xaid');
    }
}
