<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 11:20
 */

namespace App\Http\Requests;


use App\Models\Contributor;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class ContributorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $contributor = $this->contributor;
        $id = ($contributor == null) ? null : $contributor->id;
        return [
            'code' => [
                'required',
                "unique:contributors,code,{$id},id",
            ],
            'name' => [
                'required',
                'max:255',
            ],
            'last_name' => [
                'required',
                'max:255',
            ],
            'siret' => [
                'siret',
                "unique:contributors,siret,{$id},id",
            ],
        ];
    }

    public function persist($contributor = null)
    {
        if($contributor == null)
        {
            $contributor = new Contributor;
            $contributor->uuid = Uuid::generate(4);
        }
        $contributor->code = $this->input('code');
        $contributor->name = $this->input('name');
        $contributor->last_name = $this->input('last_name');
        $contributor->siret = $this->input('siret');
        return $contributor->save();
    }
}