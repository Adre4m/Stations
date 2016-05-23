<?php

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

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
    public static function rules(Station $station = null, $prefix = '', $x = null, $y = null)
    {
        $id = (isset($station) && $station->id != null) ? $station->id : 'null';
        $x = (!isset($station->x)) ?: $station->x;
        $y = (!isset($station->y)) ?: $station->y;
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
                "unique:stations,x,{$id},id,y,{$y}",
            ],
            "{$prefix}y" => [
                "required_without:{$prefix}file",
                'numeric',
                "unique:stations,y,{$id},id,x,{$x}",
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