<?php

namespace App\Http\Controllers\Admin\Experiment;

use App\Http\Controllers\Controller;
use App\Participants;
use Illuminate\Http\Request;
use App\Experiment;
use App\Experiment_Result;
use App\Experiment_Details;


class AdminSearchController extends Controller
{
    public function cw_search(Request $request, $id)
    {
        $search = $request['search'];
        $data = Experiment::where('id', $id)->first();
        $exp = Experiment_Details::where('experiment_id', $id)->get(['id']);
        $cw_participants = Participants::where('status', 'CW')
            ->whereIn('experiment_id', $exp)
            ->where('name', 'like', "%{$request->search}%")
            ->orWhere('datetime', 'like', "%{$request->search}%")
            ->orWhere('exp_name', 'like', "%{$request->search}%")
            ->latest()->paginate(4);
        $tbd_participants=Participants::where('status', 'TBD')->latest()->paginate(4);
        return view('admin.Experiment_details.search', compact('search', 'data', 'cw_participants', 'tbd_participants'));

    }
    public function tbd_search(Request $request, $id)
    {
        $search = $request['search'];
        $data = Experiment::where('id', $id)->first();
        $exp = Experiment_Details::where('experiment_id', $id)->get(['id']);
        $tbd_participants = Participants::where('status', 'TBD')
            ->whereIn('experiment_id', $exp)
            ->where('name', 'like', "%{$request->search}%")
            ->orWhere('datetime', 'like', "%{$request->search}%")
            ->orWhere('exp_name', 'like', "%{$request->search}%")
            ->latest()->paginate(4);
        $cw_participants=Participants::where('status', 'CW')->latest()->paginate(4);
        return view('admin.Experiment_details.search', compact('search', 'data', 'cw_participants', 'tbd_participants'));

    }
}
