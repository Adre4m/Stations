<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Network;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class NetworkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $network = $this->network;
        $id = ($network == null) ? null : $network->id;
        return [
            'code' => [
                'required',
                "unique:networks,code,{$id},id",
            ],
            'name'  => [
                'required',
                'max:255',
            ],
        ];
    }

    public function persist($network = null)
    {
        if($network == null)
        {
            $network = new Network;
            $network->uuid = Uuid::generate(4);
        }
        $network->code = $this->input('code');
        $network->name = $this->input('name');
        return $network->save();
    }
}