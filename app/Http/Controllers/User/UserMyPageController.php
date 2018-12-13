<?php

namespace App\Http\Controllers\User;

use App\Participants;
use App\Http\Controllers\Controller;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Experiment_Details;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserMyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $participants = Participants::where('user_id', $user['id'])->get(['experiment_id']);
        $data = Experiment_Details::whereIn('id', $participants)->latest()->paginate(6);

        return view('user.mypage.index', compact('data'));
    }
   public function show(Request $request, $id)
    {
        $value = Experiment_Details::where('id', $id)->first();
        return view('user.mypage.show', compact('value'));
    }

    public function delete($id)
    {   /**마이페이지에서 공고 지원한 거 취소하기**/
        $user = Auth::user();/**현재 로그인한 유저 정보 받고**/
        $data = Participants::where('user_id', $user['id'])->where('experiment_id', $id)->first();/**현재 로그인한 유저에 해당하며, parameter로 그 실험에 해당하는 Participant 조회**/
        Experiment_Details::where('id', $data['experiment_id'])->decrement('applicant', 1); /**지원 취소했기 때문에 Experiment_Details 테이블의 지원한 인원 수 1 감소**/
        $delete = $data->delete();/**지원 정보 삭제**/
        return "true";
    }
}
