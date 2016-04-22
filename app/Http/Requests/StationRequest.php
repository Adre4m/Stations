<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Station;
use App\Models\StationLog;
use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required|max:255',
            'x'     => 'required|digits:7',
            'y'     => 'required|digits:7',
        ];
    }

    public function persist($station = null)
    {
        $is_new = $station == null;
        if($is_new)
        {
            $station = new Station;
        }
        $station->name = $this->input('name');
        $station->x = $this->input('x');
        $station->y = $this->input('y');
        $station->contributor_id = $this->input('contributor_id');
        $station->save();
        $log = new StationLog;
        $log->station_id = $station->code;
        if($is_new)
        {
            $log->msg = 'Creation of a new station, code: ' . $station->code;
        }
        else
        {
            $log->msg = $this->input('msg');
        }
        return $log->save();
    }
}