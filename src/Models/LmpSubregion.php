<?php

namespace Lampminds\Customization\Models;

use Illuminate\Database\Eloquent\Model;

class LmpSubregion extends Model
{
    protected $table = 'lmp_subregions';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'region_id'
    ];

    public function region()
    {
        return $this->belongsTo(LmpRegion::class);
    }

    public function countries()
    {
        return $this->hasMany(LmpCountry::class);
    }
}
