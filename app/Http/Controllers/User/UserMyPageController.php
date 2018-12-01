<?php

namespace App\Http\Controllers\User;

use App\Participants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experiment_Details;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserMyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $experiments = Participants::where('user_id', $user['id'])->get();
        $data = Experiment_Details::whereIn('id', $experiments['experiment_id'])->latest()->paginate(6);
        return view('user.mypage.index', compact('data'));
    }
    public function search(){
        
    }
    public function show(Request $request, $id)
    {
        $data = Experiment_Details::where('id', $id)->first();
        return view('user.mypage.show', compact('data'));
    }
}
