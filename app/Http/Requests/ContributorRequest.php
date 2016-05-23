<?php

namespace App\Http\Requests;


use App\Models\Contributor;
use Illuminate\Foundation\Http\FormRequest;

class ContributorRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return Contributor::rules($this->contributor, 'contributor-',
            $on = $this->input('contributor-siret') == 'on');
    }

    /**
     * @param null $contributor
     * @return bool
     */
    public function persist($contributor = null)
    {
        if ($contributor == null) {
            $contributor = new Contributor;
        }
        $on = $this->input('contributor-siret') == 'on';
        $contributor->code = $this->input('contributor-code');
        $contributor->name = $this->input('contributor-name');
        $contributor->last_name = $this->input('contributor-last_name');
        $contributor->siret = $on;
        return $contributor->save();
    }
}