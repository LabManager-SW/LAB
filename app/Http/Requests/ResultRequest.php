<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
//        $file = count($this->input('file'));
//        foreach (range(0, $file) as $index) {
        $rules['file'] = 'required|max:20000';
        $rules['remark'] = 'required';
        $rules['experiment_id'] = 'required';
        $rules['participant_id'] = 'required';
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute은(는) 필수 입력 항목입니다.',
            'min' => ':attribute은(는) 최소 :min 글자 이상 입력해야 합니다.',
            'max' => ':attruibute은(는) 최대 :max 글자 이상 입력해야 합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'file' => '실험 결과',
            'remark' => '피험자 특이사항',
            'experiment_id' => '실험 번호',
            'participant_id' => '피실험자'
        ];
    }
}
