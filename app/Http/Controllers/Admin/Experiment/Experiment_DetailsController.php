<?php

namespace App\Http\Controllers\Admin\Experiment;

use App\Experiment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Experiment_Details;
use App\Experiment_Result;
use App\Participants;
use App\Http\Requests\DetailRequest;
use Illuminate\Http\Request;

class Experiment_DetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $tbd_participants = Participants::where('experiment_id', $request['id'])->
            where('status', 'TBD')->get();
        $cw_participants = Participants::where('experiment_id', $request['id'])->
        where('status', 'CW')->get();
        $data = Experiment::where('id', $request['id'])->first();
        return view('admin.Experiment_details.index', compact('data', 'tbd_participants', 'cw_participants'));
    }

    public function create(Request $request)
    {
        $participants= Participants::all();
        return view('admin.Experiment_details.create', compact('participants'));
    }


    public function store(DetailRequest $request)
    {

        $experiment_details = new Experiment_Details;
        $experiment_details['name'] = $request['name'];
        $experiment_details['experiment_id'] = $request['experiment_id'];
        $experiment_details['poa'] = $request['poa'];
        $experiment_details['background'] = $request['background'];
        $experiment_details['tester_name'] = $request['tester_name'];
        $experiment_details['time_taken'] = $request['time_taken'];
        $experiment_details['end_recruit_date'] = $request['end_recruit_date'];
        $experiment_details['payment'] = $request['payment'];
        $experiment_details['method_desc'] = $request['method_desc'];
        $experiment_details['objective'] = $request['objective'];
        $experiment_details['datetime'] = $request['datetime'];
        $experiment_details['location'] = $request['location'];
        $experiment_details['health_condition'] = $request['health_condition'];
        $experiment_details['required_applicant'] = $request['required_applicant'];
        $experiment_details['applicant'] = 0;
        $experiment_details->save();

        return back();
    }

    public function edit($id)
    {
        $data = Experiment_Details::where('id', $id)->get()[0];
        return view('admin.Experiment_details.edit', compact('data', 'soa'));
    }

    public function update(DetailRequest $request, $id)
    {
        $data = Experiment_Details::where('id', $id)
            ->update([
                'name' => $request['name'],
                'poa' => $request['poa'],
                'background' => $request['background'],
                'tester_name' => $request['tester_name'],
                'location' => $request['location'],
                'end_recruit_date' => $request['end_recruit_date'],
                'time_taken' => $request['time_taken'],
                'payment' => $request['payment'],
                'method_desc' => $request['method_desc'],
                'datetime' => $request['datetime'],
                'objective' => $request['objective'],
                'required_applicant' => $request['required_applicant'],
                'applicant' => $request['applicant'],
            ]);
        return redirect('admin/experiment_details');
    }

    public function delete($id)
    {

        $data = Experiment_Details::where('id', $id)->delete();

        return response()->json([], 204);
    }


}
