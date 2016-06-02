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
use App\Validatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NetworkStation extends Model
{

    use HasBusinessKey, GenerateUuid, Validatable, Exportable;

    protected $table = 'network_station';

    public static function rules(NetworkStation $networkStation = null)
    {
        $id = (isset($networkStation) && $networkStation->id != null) ? $networkStation->id : null;
        $network_id = (isset($networkStation) && $networkStation->network_id != null) ? $networkStation->network_id : null;
        $station_id = (isset($networkStation) && $networkStation->station_id != null) ? $networkStation->station_id : null;
        $began_at = (isset($networkStation) && $networkStation->began_at != null) ? $networkStation->began_at : null;
        return [
            'network_station-station_id' => [
                "unique:network_station,station_id,{$id},id,network_id,{$network_id},began_at,{$began_at}",
            ],
            'network_station-network_id' => [
                "unique:network_station,network_id,{$id},id,station_id,{$station_id},began_at,{$began_at}",
            ],
            'network_station-began_at' => [
                'required_without:network_station-file',
                'date',
                "unique:network_station,began_at,{$id},id,station_id,{$station_id},network_id,{$network_id}",
            ],
            'network_station-end_at' => [
                'date',
                'after:began_at',
            ],
        ];
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function network()
    {
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

    public function setStationAttribute($value)
    {
        $station = Station::whereCode($value)->firstOrNew([]);
        if ($station->exists) {
            $this->station_id = $station->id;
        } else {
            $this->station_id = -1;
        }
    }

    public function setNetworkAttribute($value)
    {
        $network = Network::whereCode($value)->firstOrNew([]);
        if ($network->exists) {
            $this->network_id = $network->id;
        } else {
            $this->network_id = -1;
        }
    }
}