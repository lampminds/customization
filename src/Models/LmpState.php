<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LmpState extends Model
{
    protected $table = 'lmp_states';
    
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'country_id',
        'state_type_id',
        'level',
        'parent_id',
        'latitude',
        'longitude',
        'timezone_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function stateType()
    {
        return $this->belongsTo(LmpStateType::class);
    }

    public function timezone()
    {
        return $this->belongsTo(LmpTimezone::class);
    }

    public function cities()
    {
        return $this->hasMany(LmpCity::class);
    }
}
