<?php

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use App\Validatable;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    use HasBusinessKey, GenerateUuid, Validatable;

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
    public static function rules(Station $station = null, $x = null, $y = null)
    {
        $id = (isset($station) && $station->id != null) ? $station->id : 'null';
        $x = (!isset($station->x)) ?: $station->x;
        $y = (!isset($station->y)) ?: $station->y;
        return [
            "station-code" => [
                "required_without:station-file",
                "unique:stations,code,{$id},id",
            ],
            "station-name" => [
                "required_without:station-file",
                'max:255'
            ],
            "station-x" => [
                "required_without:station-file",
                'numeric',
                "unique:stations,x,{$id},id,y,{$y}",
            ],
            "station-y" => [
                "required_without:station-file",
                'numeric',
                "unique:stations,y,{$id},id,x,{$x}",
            ],
//            "station-file" => [
////                "mimes:xml,csv",
//            ],
        ];
    }

    /**
     * @return array
     */
    public static function warningRules()
    {
        return [
            'station-code' => 'numeric|max:1',
        ];
    }
    /**
     * @return array
     */
    public static function infoRules()
    {
        return [
            'station-name' => 'max:5',
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