<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Network;
use App\Models\StationNetwork;
use Doctrine\Common\Cache\ZendDataCache;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class StationNetworkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $station_network = $this->station_network;
        $id = ($station_network == null) ? null : $station_network->id;
        $station_id = $this->station_id;
        $network_id = $this->network_id;
        $began_at = $this->began_at;
        return [
            'station_networks-station_id' => [
                "unique:station_networks,station_id,{$id},id,network_id,{$network_id},began_at,{$began_at}",
            ],
            'station_networks-network_id' => [
                "unique:station_networks,network_id,{$id},id,station_id,{$station_id},began_at,{$began_at}",
            ],
            'station_networks-began_at' => [
                'required',
                'date',
                "unique:station_networks,began_at,{$id},id,station_id,{$station_id},network_id,{$network_id}",
            ],
            'station_networks-end_at' => [
                'date',
                'after:began_at',
            ],
        ];
    }

    public function persist($station_network = null)
    {
        if($station_network == null)
        {
            $station_network = new StationNetwork;
        }
        $station_network->station_id = $this->input('station_networks-station_id');
        $station_network->network_id = $this->input('station_networks-network_id');
        $station_network->began_at = $this->input('station_networks-began_at');
        $station_network->end_at = $this->input('station_networks-end_at');
        return $station_network->save();
    }
}