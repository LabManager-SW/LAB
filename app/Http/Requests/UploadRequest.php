<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $rules['name'] = 'required';
        $rules['poa'] = 'required';
        $rules['background'] = 'required';
        $rules['tester_name'] = 'required';

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute은(는) 필수 입력 항목입니다.',
            'integer' => ':attribute은(는) 숫자만 입력할 수 있습니다.',
            'min' => ':attribute은(는) 최소 :min 글자 이상 입력해야 합니다.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '실험명',
            'poa' => '실험 목표 및 내용',
            'background' => '실험 추진 배경',
            'tester_name' => '담당 연구원',
        ];
    }
}
