<?php

namespace App\Http\Controllers\Admin\Experiment_Details;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Experiment_Details;
use App\Experiment_Result;
use App\Testers;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class Experiment_DetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Experiment_Details::all();
        return view('admin.experiment_details.index', compact('data'));
    }

    public function create()
    {
        $testers = Testers::all();
        $data = Experiment_Details::all();
        return view('admin.experiment_details.create', compact('data', 'testers'));
    }


    public function store(UploadRequest $request)
    {
        $experiment_details = new Experiment_Details;
        $experiment_details['name'] = $request['name'];
        $experiment_details['time_taken'] = $request['time_taken'];
        $experiment_details['payment'] = $request['payment'];
        $experiment_details['method_desc'] = $request['method_desc'];
        $experiment_details['location'] = $request['location'];
        $experiment_details['poa'] = $request['poa'];
        $experiment_details['background'] = $request['background'];
        $experiment_details['health_condition'] = $request['health_condition'];
        $experiment_details['tester_id'] = $request['tester_id'];
        $experiment_details['required_applicant'] = $request['required_applicant'];
        $experiment_details['applicant'] = 0;
        $experiment_details->save();

        return back();
    }

    public function edit($id)
    {
        $data = Experiment_Details::where('id', $id)->get()[0];
        return view('admin.experiment_details.edit', compact('data', 'soa'));
    }

    public function update(UploadRequest $request, $id)
    {
        $data = Experiment_Details::where('id', $id)
            ->update([
                'name' => $request['name'],
                'location' => $request['location'],
                'time_taken' => $request['time_taken'],
                'payment' => $request['payment'],
                'method_desc' => $request['method_desc'],
                'poa' => $request['poa'],
                'background' => $request['background'],
                'datetime' => $request['datetime'],
                'tester_id' => $request['tester_id'],
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
