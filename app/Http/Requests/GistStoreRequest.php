<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $code
 * @property ?string $description
 */
class GistStoreRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'description' => 'nullable',
        ];
    }
}
