<?php

namespace App\Http\Controllers\Admin\Experiment_Result;


use App\Experiment_Details;
use App\Http\Requests\ResultRequest;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

use App\Experiment_Result;
use App\Participants;

use Illuminate\Http\Request;

class Experiment_ResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//    public function index()
//    {
//        $participant = Participants::all();
//        $data = Experiment_Result::all();
//        $experiment = Experiment::all();
//        return view('admin.result.index', compact('data', 'participant', 'experiment'));
//    }

    public function create(Request $request)
    {
        $participant = Participants::where('id', $request['id'])->first();
        $experiment = Experiment_Details::where('id', $participant['experiment_id'])->first();
        return view('admin.Experiment_Result.create', compact( 'participant', 'experiment'));
    }
    public function show(Request $request, $id)
    {
        $participant=Participants::where('id', $id)->first();
        $user = User::where('id', $participant['user_id'])->first();
        $data = Experiment_Result::where('participant_id', $id)->latest()->paginate(4);
        return view('admin.Experiment_Result.check', compact('data', 'user', 'participant'));
    }


    public function store(ResultRequest $request)
    {
        $data = new Experiment_result;
        $data['remark'] = $request['remark'];
        $data['experiment_id'] = $request['experiment_id'];
        $data['participant_id'] = $request['participant_id'];
        $data['datetime'] = $request['datetime'];
        $url=Experiment_Details::where('id',$request['experiment_id'])->first();

        $participant= Participants::where('id', $request['participant_id'])->first();
        $status = Participants::where('id', $request['participant_id'])
            ->update([
                'status'=> 'CW'
            ]);
        $exp= Experiment_Details::where('id', $request['experiment_id'])->first();

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
            $date = Carbon::now();
            $file_name = $participant['name'].'_'.$exp['name'].$exp['id'].'_결과'.'.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);

            $data['file'] = 'upload/result/file/' . $file_name;
        }
        $data->save();
        return redirect('/admin/experiment_details/'.$url['experiment_id']);
    }

//    public function edit($id)
//    {
//        $data = Experiment_Result::where('id', $id)->get()[0];
//        $participants = Participants::where('experiment_id', $id)->get();
//        $experiment = Experiment_Details::where('id', $data['experiment_id'])->get()[0];
//        return view('admin.result.edit', compact('data', 'participants', 'experiment'));
//    }
//
//    public function update(ResultRequest $request, $id)
//    {
//        if ($request->file('file')) {
//            $deletes = Experiment_Result::where('id', $id)->get()[0];
//            File::delete($deletes['file']);
//            if (!file_exists('upload')) {
//                File::makeDirectory('upload');
//                if (!file_exists('upload/result')) {
//                    File::makeDirectory('upload/result');
//                    if (!file_exists('upload/result/file')) {
//                        File::makeDirectory('upload/result/file');
//                    }
//                }
//            }
//            $destinationPath = public_path('upload/result/file');
//            $file = $request->file('file');
//            $file_name = 'Result_of_Experiment#' . $request['experiment_id'] . '_participant#' . $request['participant_id'] . '.' . $file->getClientOriginalExtension();
//            $file->move($destinationPath, $file_name);
//            $data = Experiment_Result::where('id', $id)
//                ->update([
//                    'participant_id' => $request['participant_id'],
//                    'remark' => $request['remark'],
//                    'experiment_id' => $request['experiment_id'],
//                    'file' => 'upload/result/file/' . $file_name,
//                ]);
//        }
//        return redirect('admin/result');
//    }

    public function delete($id)
    {
        $i=$id;
        $deletes = Experiment_Result::where('participant_id', $i)->first();
        File::delete($deletes['file']); /** ->delete()는 DB의 내용을 지울 뿐. unlink를 함으로써 서버 내  파일의 실제 주소로 가서 파일 삭제**/
        $participant=Participants::where('id', $i)->delete();
        $data = Experiment_Result::where('participant_id', $i)->delete();


        return response()->json([], 204);
    }

    public function delete_user($id)
    {
        $decrease=Participants::where('id', $id)->first();
        $data=Participants::where('id', $id)->delete();
        Experiment_Details::where('id', $decrease['experiment_id'])->decrement('applicant', 1);/**해당 실험 공고의 지원자 수 1 감소**/;

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
