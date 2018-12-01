<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testers;
use App\Experiment_Details;

class UserHomeController extends Controller
{
    public function index()
    {
        $data = Experiment_Details::latest()->paginate(4);

        return view('user.home.index', compact('data'));
    }
    public function search(){
        
    }
    public function show(Request $request, $id)
    {
        $data = Experiment_Details::where('id', $id)->first();
        $tester = Testers::where('id', $data['tester_id'])->first();
        return view('user.home.show', compact('data', 'tester'));
    }
}
