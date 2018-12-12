<?php

namespace App\Http\Controllers\Admin\Experiment;

use App\Experiment_Details;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Experiment;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;

class ExperimentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Experiment_Details::all();
        $experiment = Experiment::all();
        return view('admin.Experiment.index', compact('data', 'experiment'));
    }

    public function create(Request $request)
    {
        $all = Experiment::all();
        if ($request->has('experiment')) {
            $data = Experiment::where('id', $request['experiment'])->first();
        } else
            $data = null;
        return view('admin.Experiment.create', compact('data', 'all'));
    }


    public function store(UploadRequest $request)
    {
        $experiment = new Experiment;
        $experiment['name'] = $request['name'];
        $experiment['poa'] = $request['poa'];
        $experiment['background'] = $request['background'];
        $experiment['tester_name'] = $request['tester_name'];
        $experiment->save();
        $message= $experiment['name'] . ' 등록 완료';
        return redirect()->back()->with('message', $message);
    }

    public function edit($id)
    {
        $data = Experiment::where('id', $id)->get()[0];
        return view('admin.Experiment.edit', compact('data'));
    }

    public function update(UploadRequest $request, $id)
    {
        $data = Experiment::where('id', $id)
            ->update([
                'name' => $request['name'],
                'poa' => $request['poa'],
                'background' => $request['background'],
                'tester_name' => $request['tester_name'],
            ]);
        return redirect('admin/experiment');
    }

    public function delete($id)
    {

        $data = Experiment::where('id', $id)->delete();

        return response()->json([], 204);
    }


}
