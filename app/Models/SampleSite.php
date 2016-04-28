<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SampleSite
 *
 * @property integer $id
 * @property string $name
 * @property float $x
 * @property float $y
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Belong[] $stations
 * @property-read mixed $position
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SampleSite extends Model
{

    public function stations()
    {
        return $this->hasMany(Belong::class);
    }

    public static function query()
    {
        return Station::with('stations');
    }

    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}