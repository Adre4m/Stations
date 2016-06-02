<?php

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Validatable;
use Illuminate\Database\Eloquent\Model;

class SampleSite extends Model
{

    use HasBusinessKey, GenerateUuid, Validatable, Exportable;

    public static function rules(SampleSite $sampleSite = null)
    {
        $id = (isset($sampleSite) && $sampleSite->id != null) ? $sampleSite->id : 'null';
        $x = (isset($sampleSite->x)) ? $sampleSite->x : null;
        $y = (isset($sampleSite->y)) ? $sampleSite->y : null;
        $station_id = (isset($sampleSite->station_id)) ? $sampleSite->station_id : null;
        return [
            'sample_site-code' => [
                "required_without:sample_site-file",
                "unique:sample_sites,code,{$id},id,station_id,{$station_id}",
            ],
            'sample_site-name' => [
                "required_without:sample_site-file",
                'max:255',
            ],
            'sample_site-x' => [
                "required_without:sample_site-file",
                'numeric',
                "unique:sample_sites,x,{$id},id,y,{$y}",
            ],
            'sample_site-y' => [
                "required_without:sample_site-file",
                'numeric',
                "unique:sample_sites,y,{$id},id,x,{$x}",
            ],
        ];
    }

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

    public function setStationAttribute($value)
    {
        $station = Station::whereCode($value)->firstOrNew([]);
        if ($station->exists) {
            $this->station_id = $station->id;
        } else {
            $this->station_id = -1;
        }
    }
}