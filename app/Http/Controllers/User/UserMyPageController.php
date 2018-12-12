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

    public function search()
    {

    }

    public function show(Request $request, $id)
    {
        $value = Experiment_Details::where('id', $id)->first();
        return view('user.mypage.show', compact('value'));
    }

    public function delete($id)
    {
        $user = Auth::user();
        $data = Participants::where('user_id', $user['id'])->where('experiment_id', $id)->first();
        Experiment_Details::where('id', $data['experiment_id'])->decrement('applicant', 1);
        $delete = $data->delete();
        return "true";

    }
}
