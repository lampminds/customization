<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LmpCountry extends Model
{
    protected $dont_use_audit = true;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'iso_3',
        'iso_2',
        'phonecode',
        'capital',
        'currency_id',
        'tld',
        'subregion_id',
        'emoji',
        'emojiU',
    ];

    public function currency()
    {
        return $this->belongsTo(LmpCurrency::class, 'currency_id');
    }

    public function subregion()
    {
        return $this->belongsTo(LmpSubregion::class, 'subregion_id');
    }

    public function states()
    {
        return $this->hasMany(LmpState::class, 'country_id');
    }


}
