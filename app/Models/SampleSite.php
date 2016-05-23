<?php

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

class SampleSite extends Model
{

    use HasBusinessKey, GenerateUuid;

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public static function query()
    {
        return SampleSite::select(['id', 'code', 'name', 'x', 'y',])->with('station')->newQuery();
    }

    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}