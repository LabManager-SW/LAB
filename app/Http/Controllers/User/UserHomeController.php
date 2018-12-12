<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Participants;
use App\User;
use Illuminate\Http\Request;
use App\Experiment_Details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserHomeController extends Controller
{
    public function index()
    {
        $data = Experiment_Details::latest()->paginate(4);

        return view('user.home.index', compact('data'));
    }
    public function show_all(){
        $data = Experiment_Details::latest()->paginate(10);

        return view('user.home.all', compact('data'));
    }


    public function search()
    {

    }

    public function show(Request $request, $id)
    {
        $calendar= Experiment_Details::all();
        $data = Experiment_Details::where('id', $id)->first();
        return view('user.home.show', compact('data', 'calendar'));
    }

    public function apply(Request $request, $exp_id, $id)
    {
        $user = User::where('id', $id)->first();
        /**해당 지원자 객체를 DB의 User table에서 받기**/
        $exp = Experiment_Details::where('id', $exp_id)->first();
        /**해당 실험 객체를 DB의 Experiment table에서 받기**/
        if (DB::table('participants')->where('user_id', '=', $id)
            ->where('experiment_id', '=', $exp_id)
            ->exists()) {
            $message = "이미 지원하신 공고입니다.";
        } else {
            if ($exp['required_applicant'] <= $exp['applicant'])
                $message = "이미 모집이 끝난 공고입니다. 다른 공고를 지원해주시길 바랍니다.";
            else {
                Experiment_Details::where('id', $exp_id)->increment('applicant', 1);/**해당 실험 공고의 지원자 수 1 증가**/;
                $participant = New Participants;
                $participant['user_id'] = $user['id'];
                $participant['experiment_id'] = $exp['id'];
                $participant['exp_name'] = $exp['name'];
                $participant['name'] = $user['name'];
                $participant['status'] = 'TBD';
                $participant['datetime']= $exp['datetime'];
                $participant->save();
                $message = "해당 공고 지원 완료!";
            }
        }
        return redirect()->back()->with('message', $message);
    }

}
