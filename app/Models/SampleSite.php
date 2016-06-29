<?php

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\SampleSite
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $station_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Station $station
 * @property-read mixed $position
 * @property-read mixed $business_key
 * @method static Builder|SampleSite whereId($value)
 * @method static Builder|SampleSite whereUuid($value)
 * @method static Builder|SampleSite whereCode($value)
 * @method static Builder|SampleSite whereName($value)
 * @method static Builder|SampleSite whereX($value)
 * @method static Builder|SampleSite whereY($value)
 * @method static Builder|SampleSite whereStationId($value)
 * @method static Builder|SampleSite whereCreatedAt($value)
 * @method static Builder|SampleSite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SampleSite extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    public static $header = [
        'code' => 'code',
        'name' => 'name',
        'x' => 'x',
        'y' => 'y',
        'station' => 'station',
    ];

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
            'sample_site-station_id' => [
                'exists:stations,id'
            ]
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
        /** @var Station $station */
        $station = Station::whereCode($value)->firstOrNew([]);
        if ($station->exists) {
            $this->station_id = $station->id;
        } else {
            $this->station_id = -1;
        }
    }
}