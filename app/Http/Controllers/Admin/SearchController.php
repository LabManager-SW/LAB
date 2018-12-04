<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participants;
use App\Experiment_Result;
use App\Experiment_Details;


class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function search(Request $request){
        $requests = $request;
        $data = Experiment_Result::where('실험명', 'LIKE', "%{$request->search}%")->orWhere('피실험자이름', 'LIKE', "%{$request->search}%")
            ->orderBy('순서')->paginate(12);
        return view('Search.search.Search', compact('requests', 'data'));
    }
}
