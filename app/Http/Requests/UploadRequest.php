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
        $rules['location'] = 'required';
        $rules['poa'] = 'required';
        $rules['time_taken'] = 'required';
        $rules['payment'] = 'required';
        $rules['method_desc'] = 'required';
        $rules['background'] = 'required';
        $rules['health_condition'] = 'required';
        $rules['tester_id'] = 'required';
        $rules['required_applicant'] = 'required|integer';
        $rules['applicant'] = 'nullable';

        return $rules;
    }
    public function messages(){
        return[
            'required'=> ':attribute은(는) 필수 입력 항목입니다.',
            'integer'=> ':attribute은(는) 숫자만 입력할 수 있습니다.',
            'min'=>':attribute은(는) 최소 :min 글자 이상 입력해야 합니다.'
        ];
    }
    public function attributes()
    {
        return[
            'name' => '실험명',
            'location' => '실험 장소',
            'poa' => '실험 목표 및 내용',
            'time_taken' => '소요 시간',
            'payment' => '피실험자 수당',
            'method_desc' => '실험 방법 설명',
            'background' => '실험 추진 배경',
            'health_condition' => '피실험자 자격',
            'tester_id' => '담당 연구원',
            'required_applicant' => '필요 인원 수'
        ];
    }
}
