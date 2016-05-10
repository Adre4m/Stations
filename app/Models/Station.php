<?php

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Station
 *
 * @property integer $code
 * @property string $uuid
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $manager_id
 * @property integer $owner_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Contributor $manager
 * @property-read \App\Models\Contributor $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SampleSite[] $sample_sites
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StationNetwork[] $measurement_networks
 * @property-read mixed $position
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereManagerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereOwnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StationNetwork[] $networks
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereId($value)
 */
class Station extends Model
{

    use HasBusinessKey, GenerateUuid;

    protected $rules = [

    ];

    protected $business = 'id';

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
        return $this->hasMany(SampleSite::class);
    }

    public function networks()
    {
        return $this->hasMany(StationNetwork::class);
    }

    public static function query()
    {
        return Station::select(['id', 'code', 'name', 'x', 'y', 'manager_id', 'owner_id',])
            ->with('manager', 'owner', 'sample_sites')->newQuery();
    }

    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}