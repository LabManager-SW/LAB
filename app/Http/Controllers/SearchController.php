<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiment;
use App\Experiment_Result;
use App\Experiment_Details;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $requests=$request['search'];
        $details = Experiment_Details::where('name', 'like', "%{$request->search}%")
            ->orWhere('poa', 'like', "%{$request->search}%")
            ->orWhere('background', 'like', "%{$request->search}%")
            ->orWhere('tester_name', 'like', "%{$request->search}%")
            ->orWhere('objective', 'like', "%{$request->search}%")
            ->orWhere('location', 'like', "%{$request->search}%")
            ->orWhere('method_desc', 'like', "%{$request->search}%")
            ->orWhere('health_condition', 'like', "%{$request->search}%")
            ->orWhere('datetime', 'like', "%{$request->search}%")
            ->latest()->paginate(10);
        return view('user.home.search', compact('requests', 'details'));
    }
}
