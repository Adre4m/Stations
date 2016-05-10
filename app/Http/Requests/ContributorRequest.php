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
            'contributor-code' => [
                'required',
                "unique:contributors,code,{$id},id",
            ],
            'contributor-name' => [
                'required',
                'max:255',
            ],
            'contributor-last_name' => [
                'required',
                'max:255',
            ],
            'contributor-siret' => [
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
        }
        $contributor->code = $this->input('contributor-code');
        $contributor->name = $this->input('contributor-name');
        $contributor->last_name = $this->input('contributor-last_name');
        $contributor->siret = $this->input('contributor-siret');
        return $contributor->save();
    }
}