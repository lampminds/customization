<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LmpCity extends Model
{
    protected $table = 'lmp_cities';
    
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'state_id',
        'latitude',
        'longitude',
        'timezone_id'
    ];

    public function state()
    {
        return $this->belongsTo(LmpState::class);
    }

    public function timezone()
    {
        return $this->belongsTo(LmpTimezone::class);
    }
}
