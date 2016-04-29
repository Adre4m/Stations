<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SampleSite
 *
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $station_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Station $station
 * @property-read mixed $position
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SampleSite extends Model
{

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public static function query()
    {
        return SampleSite::with('station');
    }

    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}