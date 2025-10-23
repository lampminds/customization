<?php

namespace Lampminds\Customization\Models;

use Illuminate\Database\Eloquent\Model;

class LmpCurrency extends Model
{
    protected $table = 'lmp_currencies';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'symbol',
        'name'
    ];

    public function countries()
    {
        return $this->hasMany(LmpCountry::class);
    }
}
