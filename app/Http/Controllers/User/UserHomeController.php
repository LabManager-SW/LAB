<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experiment_Details;

class UserHomeController extends Controller
{
    public function index()
    {
        $data = Experiment_Details::latest()->paginate(6);
        return view('user.home', compact('data'));
    }
    public function search(){
        
    }
    public function show(Request $request, $id)
    {
        $data = Experiment_Details::where('id', $id)->first();
        return view('user.home', compact('data'));
    }
}
