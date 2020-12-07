<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;

class CreateProjectRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|unique:projects,code',
            'name' => 'required',
            'location' => 'required',
            'details' => 'sometimes',
            'investment' => 'required|in:self,sponsored',
            'budget' => 'sometimes',
            'materials' => 'required'
        ];
    }
}
