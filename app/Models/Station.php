<?php

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    protected $fillable = [
        'code', 'name', 'x', 'y',
    ];

    /**
     * @return array
     */
    public static function rules(Station $station = null)
    {
        $id = null;
        $x = null;
        $y = null;
        if (isset($station)) {
            $id = $station->id;
            $x = $station->x;
            $y = $station->y;
        }
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
            "station-manager_id" => [
                'exists:contributors,id'
            ],
            "station-owner_id" => [
                'exists:contributors,id'
            ]
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
    public function manager()
    {
        return $this->belongsTo(Contributor::class);
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

    public function setManagerAttribute($value)
    {
        $manager = Contributor::whereCode($value)->firstOrNew([]);
        if ($manager->exists) {
            $this->manager_id = $manager->id;
        } else {
            $this->manager_id = -1;
        }
    }

    public function setOwnerAttribute($value)
    {
        $owner = Contributor::whereCode($value)->firstOrNew([]);
        if ($owner->exists) {
            $this->owner_id = $owner->id;
        } else {
            $this->owner_id = -1;
        }
    }

}