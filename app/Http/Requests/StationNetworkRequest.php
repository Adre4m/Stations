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
        return [
            'station_id' => 'unique:station_networks,station_id,NULL,id,network_id,' . $this->input('network_id') . ',began_at,' . $this->input('began_at'),
            'network_id' => 'unique:station_networks,network_id,NULL,id,station_id,' . $this->input('station_id') . ',began_at,' . $this->input('began_at'),
            'began_at' => 'required|date|unique:station_networks,began_at,NULL,id,station_id,' . $this->input('station_id') . ',network_id,' . $this->input('network_id'),
            'end_at' => 'date|after:began_at',
        ];
    }

    public function persist($station_network = null)
    {
        if($station_network == null)
        {
            $station_network = new StationNetwork;
            $station_network->uuid = Uuid::generate(4);
        }
        $station_network->station_id = $this->input('station_id');
        $station_network->network_id = $this->input('network_id');
        $station_network->began_at = $this->input('began_at');
        $station_network->end_at = $this->input('end_at');
        return $station_network->save();
    }
}