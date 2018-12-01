<?php

namespace App\Http\Controllers\User;

use App\Participants;
use App\Http\Controllers\Controller;

use App\Testers;
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
        $tester = Testers::where('id', $value['tester_id'])->first();
        return view('user.mypage.show', compact('value', 'tester'));
    }
}
