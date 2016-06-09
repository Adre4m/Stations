<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Interpreter\CSVInterpreter;
use App\Models\Network;
use App\Models\NetworkStation;
use Illuminate\Foundation\Http\FormRequest;

class NetworkStationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return NetworkStation::rules($this->network_station);
    }

    public function persist($network_station = null)
    {
        if ($network_station == null) {
            $network_station = new NetworkStation;
        }
        if ($this->hasFile('network_station-file')) {
            $interpreter = new CSVInterpreter();
            $res = $interpreter
                ->forFile($this->file('network_station-file'))
                ->forClass(NetworkStation::class)
                ->getContent();
            return $network_station->validateCollection($res);
        } else {
            $network_station->station_id = $this->input('network_station-station_id');
            $network_station->network_id = $this->input('network_station-network_id');
            $network_station->began_at = $this->input('network_station-began_at');
            $network_station->end_at = $this->input('network_station-end_at');
            $network_station->save();
        }
        return $network_station;
    }
}