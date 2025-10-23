<?php

namespace Lampminds\Customization\Models;

use Illuminate\Database\Eloquent\Model;

class LmpStateType extends Model
{
    protected $table = 'lmp_state_types';

    public $timestamps = false;

    protected $fillable = [
        'type'
    ];

    public function states()
    {
        return $this->hasMany(LmpState::class);
    }
}
