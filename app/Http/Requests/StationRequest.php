<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


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
            'code'  => [
                'required',
                "unique:stations,code,{$id},id",
            ],
            'name'  => [
                'required',
                'max:255'
            ],
            'x'     => [
                'required',
                'numeric',
                "unique:stations,x,{$id},id,y,{$this->y}",
            ],
            'y'     => [
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
            $station->uuid = Uuid::generate(4);
        }
        $station->code = $this->input('code');
        $station->name = $this->input('name');
        $station->x = $this->input('x');
        $station->y = $this->input('y');
        $station->manager_id = $this->input('manager_id');
        $station->owner_id = $this->input('owner_id');
        return  $station->save();
    }
}