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
            'code' => 'required|unique',
            'name'  => 'required|max:255',
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