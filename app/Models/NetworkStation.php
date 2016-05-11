<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 11:04
 */

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NetworkStation
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $station_id
 * @property integer $measurement_network_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\Network $measurement_network
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $network_id
 * @property string $began_at
 * @property string $end_at
 * @property-read \App\Models\Network $network
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereEndAt($value)
 */
class NetworkStation extends Model
{

    use HasBusinessKey, GenerateUuid;

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
        return NetworkStation::select(['id', 'station_id', 'network_id', 'began_at', 'end_at'])->with('station', 'network')->newQuery();
    }

    public function getBeginAttribute()
    {
        return Carbon::parse($this->began_at)->format('d/m/Y H:i:s');
    }

    public function getEndAttribute()
    {
        return Carbon::parse($this->end_at)->format('d/m/Y H:i:s');
    }

    /*public function getStationAttribute()
    {
        $station = Station::findOrFail($this->station_id);
        return "{$station->code}";
    }

    public function getNetworkAttribute()
    {
        $network = Network::findOrFail($this->network_id);
        return "{$network->code}";
    }*/

}