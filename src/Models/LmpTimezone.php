<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LmpTimezone extends Model
{
    protected $table = 'lmp_timezones';
    
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];

    public function states()
    {
        return $this->hasMany(LmpState::class);
    }

    public function cities()
    {
        return $this->hasMany(LmpCity::class);
    }
}
