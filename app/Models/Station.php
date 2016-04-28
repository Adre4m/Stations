<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Station
 *
 * @property integer $code
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $manager_id
 * @property integer $owner_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Contributor $manager
 * @property-read \App\Models\Contributor $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Belong[] $sample_sites
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StationLog[] $stationLogs
 * @property-read mixed $position
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereManagerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{

    protected $primaryKey = 'code';

    public function manager()
    {
        return $this->belongsTo(Contributor::class);
    }

    public function owner()
    {
        return $this->belongsTo(Contributor::class);
    }

    public function sample_sites()
    {
        return $this->hasMany(Belong::class);
    }

    public function stationLogs()
    {
        return $this->hasMany(StationLog::class);
    }

    public static function query()
    {
        return Station::with('manager', 'owner', 'sample_sites');
    }

    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}