<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Interpreter\TXTInterpreter;
use App\Models\Network;
use Illuminate\Foundation\Http\FormRequest;

class NetworkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Network::rules($this->network);
    }

    public function persist($network = null)
    {
        if ($network == null) {
            $network = new Network;
        }
        if ($this->hasFile('network-file')) {
            $interpreter = new TXTInterpreter();
            $res = $interpreter
                ->forFile($this->file('network-file'))
                ->forClass(Network::class)
                ->getContent();
            return $network->validateCollection($res);
        } else {
            $network->code = $this->input('network-code');
            $network->name = $this->input('network-name');
            $network->save();
        }
        return $network;
    }
}