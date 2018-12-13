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

    public function create(Request $request)
    {
        $participant = Participants::where('id', $request['id'])->first();
        $experiment = Experiment_Details::where('id', $participant['experiment_id'])->first();
        return view('admin.Experiment_Result.create', compact('participant', 'experiment'));
    }
    public function show(Request $request, $id)
    {
        $participant = Participants::where('id', $id)->first();
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
        $url = Experiment_Details::where('id', $request['experiment_id'])->first();
        $participant = Participants::where('id', $request['participant_id'])->first();
        $status = Participants::where('id', $request['participant_id'])
            ->update([
                'status' => 'CW'
            ]);
        $exp = Experiment_Details::where('id', $request['experiment_id'])->first();
        if ($request->file('file')) { /** 실험 결과 파일 있으면 저장해라**/
            if (!file_exists('upload')) { /**public 폴더 내에 해당 이름의 폴더가 있는지 체크**/
                File::makeDirectory('upload');/**없으면 File의 makeDirectory 메소드로 폴더를 만듦**/
                if (!file_exists('upload/result')) {
                    File::makeDirectory('upload/result');
                    if (!file_exists('upload/result/file')) {
                        File::makeDirectory('upload/result/file');
                    }
                }
            }
            $destinationPath = public_path('upload/result/file');/**public파일 경로를 column에 저장하기 위해서**/
            $file = $request->file('file');
            $date = Carbon::now();
            $file_name = $participant['name'] . '_' . $exp['name'] . $exp['id'] . '_결과' . '.' . $file->getClientOriginalExtension();
            /**파일 이름을 피실험자 이름, 연구명, 연구 번호로 구성하여 파일의 type과 함께 저장.**/
            $file->move($destinationPath, $file_name);/**파일을 실제 경로에 저장.**/
            $data['file'] = 'upload/result/file/' . $file_name;
            /**실제 경로의 주소를 file 컬럼에 저장. 실제 경로에 있는 파일을 참조할 때 쓰임.(ex. 파일 다운로드할 때**/
        }
        $data->save();
        return redirect('/admin/experiment_details/' . $url['experiment_id']);

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
        $i = $id;
        $deletes = Experiment_Result::where('participant_id', $i)->first();
        File::delete($deletes['file']);
        $participant = Participants::where('id', $i)->delete();
        $data = Experiment_Result::where('participant_id', $i)->delete();
        return response()->json([], 204);
    }
    public function delete_user($id)
    {
        $decrease = Participants::where('id', $id)->first();/**parameter인 id로 해당 실험 공고에 지원한 지원자 조회**/
        $data = Participants::where('id', $id)->delete(); /**Participant 테이블에서 id값에 해당하는 지원자 삭제.**/
        Experiment_Details::where('id', $decrease['experiment_id'])->decrement('applicant', 1);
        return response()->json([], 204);
    }

    public function download(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $data = Experiment_Result::where('id', $id)->first();
        $download_path = (public_path() . '/' . $data->file);
        return response()->download($download_path);
    }

//    public function index()
//    {
//        $participant = Participants::all();
//        $data = Experiment_Result::all();
//        $experiment = Experiment::all();
//        return view('admin.result.index', compact('data', 'participant', 'experiment'));
//    }
}
