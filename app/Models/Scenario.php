<?php

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{

    use HasBusinessKey, GenerateUuid;

    protected $fillable = [
        'code', 'name', 'version', 'began_at', 'end_at',
    ];

    /**
     * @return array
     */
    public static function rules(Station $station = null, $prefix = '', $x = null, $y = null)
    {

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transmitter()
    {
        return $this->belongsTo(Contributor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver()
    {
        return $this->belongsTo(Contributor::class);
    }
}