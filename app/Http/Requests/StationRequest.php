<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;

use App\Interpreter\QUESUInterpreter;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Station::rules($this->station, 'station-', $this->x, $this->y);
    }

    /**
     * @param null $station
     * @return $this|bool
     */
    public function persist($station = null)
    {
        /** @var \App\Models\Station $station */
        if ($station == null) {
            $station = new Station;
        }
        if ($this->hasFile('station-file')) {
            $quesu = new QUESUInterpreter();
            $res = $quesu->parse($this->file('station-file'));
            $station = $quesu->interpret($res);
            dd($res);
            dd($station);
            $quesu->interpret($res);
        } else {
            $station->code = $this->input('station-code');
            $station->name = $this->input('station-name');
            $station->x = $this->input('station-x');
            $station->y = $this->input('station-y');
            $station->manager_id = $this->input('station-manager_id');
            $station->owner_id = $this->input('station-owner_id');
        }
        return $station->save();
    }
}