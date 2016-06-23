<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;

use App\Interpreter\CSVInterpreter;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Station station
 */
class StationRequest extends FormRequest
{

    // Renvois true
    public function authorize()
    {
        return true;
    }

    // Renvois Station::rules
    public function rules()
    {
        $info = \Validator::make($this->all(), Station::infoRules());
        $warning = \Validator::make($this->all(), Station::warningRules());
        session()->flash('warnings', $warning->errors());
        session()->flash('info', $info->errors());
        return Station::rules($this->station);
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
            $interpreter = new CSVInterpreter();
            $res = $interpreter
                ->forFile($this->file('station-file'))
                ->forClass(Station::class)
                ->getContent();
            return $station->validateCollection($res);
        } else {
            $station->code = $this->input('station-code');
            $station->name = $this->input('station-name');
            $station->x = $this->input('station-x');
            $station->y = $this->input('station-y');
            $station->manager_id = $this->input('station-manager_id');
            $station->owner_id = $this->input('station-owner_id');
            $station->save();
        }
        return $station;
    }
}