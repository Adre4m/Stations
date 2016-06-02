<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 11:04
 */

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NetworkStation extends Model
{

    use HasBusinessKey, GenerateUuid, Exportable;

    protected $table = 'network_station';

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function network() {
        return $this->belongsTo(Network::class);
    }

    public static function query()
    {
        return NetworkStation::select(['id', 'station_id', 'network_id', 'began_at', 'end_at'])
            ->with('station', 'network')->newQuery();
    }

    public function getBeginAttribute()
    {
        return Carbon::parse($this->began_at)->format('d/m/Y H:i:s');
    }

    public function getEndAttribute()
    {
        return Carbon::parse($this->end_at)->format('d/m/Y H:i:s');
    }

}