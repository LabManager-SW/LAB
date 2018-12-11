<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
        $rules['location'] = 'required';
        $rules['end_recruit_date'] = 'required';
        $rules['time_taken'] = 'required';
        $rules['payment'] = 'required';
        $rules['objective'] = 'required';
        $rules['method_desc'] = 'required';
        $rules['health_condition'] = 'required';
        $rules['required_applicant'] = 'required|integer';
        $rules['applicant'] = 'nullable';
        $rules['datetime'] = 'nullable';

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
            'location' => '실험 장소',
            'time_taken' => '소요 시간',
            'payment' => '피실험자 수당',
            'method_desc' => '실험 방법 설명',
            'health_condition' => '피실험자 자격',
            'objective' => '실험 목표 및 내용',
            'end_recruit_date' => '공고 마감일',
            'required_applicant' => '필요 인원 수',
            'datetime' => '실험 날짜'
        ];
    }
}
