<?php

namespace App\Http\Controllers\Admin\Experiment_Result;


use App\Http\Requests\ResultRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

use App\Experiment;
use App\Experiment_Result;
use App\Participants;

use Illuminate\Http\Request;

class Experiment_ResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $participant = Participants::all();
        $data = Experiment_Result::all();
        $experiment = Experiment::all();
        return view('admin.result.index', compact('data', 'participant', 'experiment'));
    }

    public function create()
    {
        $participant = Participants::all();
        $data = Experiment_Result::all();
        $experiment = Experiment::all();
        return view('admin.result.create', compact('data', 'participant', 'experiment'));
    }


    public function store(ResultRequest $request)
    {
        $data = new Experiment_result;
        $data['remark'] = $request['remark'];
        $data['experiment_id'] = $request['experiment_id'];
        $data['participant_id'] = $request['participant_id'];
        $data['datetime'] = $request['datetime'];

        /** 실험 결과 파일 있으면 저장해라**/
        if ($request->file('file')) {
            if (!file_exists('upload')) {
                File::makeDirectory('upload');
                if (!file_exists('upload/result')) {
                    File::makeDirectory('upload/result');
                    if (!file_exists('upload/result/file')) {
                        File::makeDirectory('upload/result/file');
                    }
                }
            }
            $destinationPath = public_path('upload/result/file');
            $file = $request->file('file');
            $file_name = 'Result_of_Experiment#' . $request['experiment_id'] . '_participant#' . $request['participant_id'] . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);
            $data['file'] = 'upload/result/file/' . $file_name;
        }
        $data->save();
        return back();
    }

    public function edit($id)
    {
        $data = Experiment_Result::where('id', $id)->get()[0];
        $participants = Participants::where('experiment_id', $id)->get();
        $experiment = Experiment::where('id', $data['experiment_id'])->get()[0];
        return view('admin.result.edit', compact('data', 'participants', 'experiment'));
    }

    public function update(ResultRequest $request, $id)
    {
        if ($request->file('file')) {
            $deletes = Experiment_Result::where('id', $id)->get()[0];
            File::delete($deletes['file']);
            if (!file_exists('upload')) {
                File::makeDirectory('upload');
                if (!file_exists('upload/result')) {
                    File::makeDirectory('upload/result');
                    if (!file_exists('upload/result/file')) {
                        File::makeDirectory('upload/result/file');
                    }
                }
            }
            $destinationPath = public_path('upload/result/file');
            $file = $request->file('file');
            $file_name = 'Result_of_Experiment#' . $request['experiment_id'] . '_participant#' . $request['participant_id'] . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);
            $data = Experiment_Result::where('id', $id)
                ->update([
                    'participant_id' => $request['participant_id'],
                    'remark' => $request['remark'],
                    'experiment_id' => $request['experiment_id'],
                    'file' => 'upload/result/file/' . $file_name,
                ]);
        }
        return redirect('admin/result');
    }

    public function delete($id)
    {
        $deletes = Experiment_Result::where('id', $id)->get()[0];
        unlink($deletes['file']); /** ->delete()는 DB의 내용을 지울 뿐. unlink를 함으로써 서버 내  파일의 실제 주소로 가서 파일 삭제**/

        $data = Experiment_result::where('id', $id)->delete();

        return response()->json([], 204);
    }

    public function download(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $data = Experiment_Result::where('id', $id)->first();
        $download_path = (public_path() . '/' . $data->file);
        return response()->download($download_path);
    }


}
