<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Network;
use App\Models\NetworkStation;
use Doctrine\Common\Cache\ZendDataCache;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class NetworkStationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $network_station = $this->network_station;
        $id = ($network_station == null) ? null : $network_station->id;
        $station_id = $this->input('network_station-station_id');
        $network_id = $this->input('network_station-network_id');
        $began_at = $this->input('network_station-began_at');
        return [
            'network_station-station_id' => [
                "unique:network_station,station_id,{$id},id,network_id,{$network_id},began_at,{$began_at}",
            ],
            'network_station-network_id' => [
                "unique:network_station,network_id,{$id},id,station_id,{$station_id},began_at,{$began_at}",
            ],
            'network_station-began_at' => [
                'required',
                'date',
                "unique:network_station,began_at,{$id},id,station_id,{$station_id},network_id,{$network_id}",
            ],
            'network_station-end_at' => [
                'date',
                'after:began_at',
            ],
        ];
    }

    public function persist($network_station = null)
    {
        if($network_station == null)
        {
            $network_station = new NetworkStation;
        }
        $network_station->station_id = $this->input('network_station-station_id');
        $network_station->network_id = $this->input('network_station-network_id');
        $network_station->began_at = $this->input('network_station-began_at');
        $network_station->end_at = $this->input('network_station-end_at');
        return $network_station->save();
    }
}