<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Contributor;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class StationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $station = $this->station;
        $id = ($station == null) ? null : $station->id;
        return [
            'station-code'  => [
                'required',
                "unique:stations,code,{$id},id",
            ],
            'station-name'  => [
                'required',
                'max:255'
            ],
            'station-x'     => [
                'required',
                'numeric',
                "unique:stations,x,{$id},id,y,{$this->y}",
            ],
            'station-y'     => [
                'required',
                'numeric',
                "unique:stations,y,{$id},id,x,{$this->x}",
            ],
        ];
    }

    public function persist($station = null)
    {
        if($station == null)
        {
            $station = new Station;
        }
        $station->code = $this->input('station-code');
        $station->name = $this->input('station-name');
        $station->x = $this->input('station-x');
        $station->y = $this->input('station-y');
        $station->manager_id = $this->input('station-manager_id');
        $station->owner_id = $this->input('station-owner_id');
        return  $station->save();
    }
}