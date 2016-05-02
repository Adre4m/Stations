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
        return [
            'name'  => 'required|max:255',
            'x'     => 'required|regex:"[-]?[0-9]{1,3}([.][0-9]{0,3})?"',
            'y'     => 'required|regex:"[-]?[0-9]{1,3}([.][0-9]{0,3})?"',
        ];
    }

    public function persist($measurement_network = null)
    {
        if($measurement_network == null)
        {
            $measurement_network = new Network;
            $measurement_network->uuid = Uuid::generate(4);
        }
        return $measurement_network->save();
    }
}