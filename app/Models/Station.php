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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NetworkStation[] $networks
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereId($value)
 * @property-read mixed $business_key
 */
class Station extends Model
{

    use HasBusinessKey, GenerateUuid;

    protected $fillable = [
      'code', 'name', 'x', 'y',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(Contributor::class);
    }

    /**
     * @return array
     */
    public static function rules(Station $station = null, $prefix = '')
    {
//        dd($station, $prefix);
        $id = (isset($station) && $station->id != null) ? $station->id : 'null';
        return [
            "{$prefix}code" => [
                "required_without:{$prefix}file",
                "unique:stations,code,{$id},id",
            ],
            "{$prefix}name" => [
                "required_without:{$prefix}file",
                'max:255'
            ],
            "{$prefix}x" => [
                "required_without:{$prefix}file",
                'numeric',
//                "unique:stations,x,{$id},id,y,{$station->y}",
            ],
            "{$prefix}y" => [
                "required_without:{$prefix}file",
                'numeric',
//                "unique:stations,y,{$id},id,x,{$station->x}",
            ],
            "{$prefix}file" => [
                "required_without_all:{$prefix}code,{$prefix}name,{$prefix}x,{$prefix}y",
                "mimes:xml",
            ],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(Contributor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sample_sites()
    {
        return $this->hasMany(SampleSite::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function networks()
    {
        return $this->belongsToMany(Network::class)->withPivot('began_at', 'end_at');
    }

    /**
     * @return mixed
     */
    public static function query()
    {
        return Station::select(['id', 'code', 'name', 'x', 'y', 'manager_id', 'owner_id',])
            ->with('manager', 'owner', 'sample_sites')->newQuery();
    }

    /**
     * @return string
     */
    public function getPositionAttribute()
    {
        return "({$this->x}, {$this->y})";
    }
}