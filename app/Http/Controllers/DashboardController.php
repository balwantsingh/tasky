<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function dragTasks(Request $request)
    {
        //get Task
        $dealIds = $request->input('task_id');
        $dealIds = explode("_", $dealIds);
        $d = count($dealIds) - 1;
        $deal_id = $dealIds[$d];


        //below will check in which card it moved
        //get status id
        $stageIds = $request->input('status_id');
        $stageIds = explode("_", $stageIds);
        $s = count($stageIds) - 1;
        $sfun_id = $stageIds[$s];


        //from card
        $fromIds = $request->input('from_id');
        $fromIds = explode("_", $fromIds);
        $f = count($fromIds) - 1;
        $from_id = $fromIds[$f];

        $fromStage = Status::find($from_id);
        $fromStageId = str_replace(" ", "_", $fromStage->name) . '_' . $from_id;


        $toStage = Status::find($sfun_id);
        $toStageId = str_replace(" ", "_", $toStage->name) . '_' . $sfun_id;

        $deals = Task::find($deal_id);
        $deals->status_id = $sfun_id;

        $res = $deals->save();

        if ($res) {

            $data['fromStageId'] =  $fromStageId;

            $data['toStageId'] =  $toStageId;

            return json_encode($data);

        } else {

            return 'error';

        }
    }
}
