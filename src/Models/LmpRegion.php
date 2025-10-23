<?php

namespace Lampminds\Customization\Models;

use Illuminate\Database\Eloquent\Model;

class LmpRegion extends Model
{
    protected $table = 'lmp_regions';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function subregions()
    {
        return $this->hasMany(LmpSubregion::class);
    }
}
