<?php

namespace App\Http\Controllers\Admin\Experiment;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Experiment;
use App\Testers;
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
        $data = Experiment::all();
        return view('admin.Experiment.index', compact('data'));
    }

    public function create(Request $request)
    {
        $testers = Testers::all();
        $all = Experiment::all();
        if ($request->has('experiment')) {
            $data = Experiment::where('id', $request['experiment'])->first();
        } else
            $data = null;
        return view('admin.Experiment.create', compact('data', 'testers', 'all'));
    }


    public function store(UploadRequest $request)
    {
        $experiment = new Experiment;
        $experiment['name'] = $request['name'];
        $experiment['poa'] = $request['poa'];
        $experiment['background'] = $request['background'];
        $experiment['tester_id'] = $request['tester_id'];
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
                'tester_id' => $request['tester_id'],
            ]);
        return redirect('admin/experiment');
    }

    public function delete($id)
    {

        $data = Experiment::where('id', $id)->delete();

        return response()->json([], 204);
    }


}
