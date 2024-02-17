<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Leave\CreateLeaveRequest;
use App\Http\Requests\Leave\UpdateLeaveRequest;
use App\Models\Leave;
use Exception;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function ReadAllLeave(){

        try{
            return response()->json([
                'status_code' => 200,
                'message' => 'All Leave',
                'leave' => Leave::all()
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

    }

    public function ReadLeave(Leave $leave){

        try{
            return response()->json([
                'status_code' => 200,
                'message' => ' Leave',
                'leave' => $leave
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

    }

    public function CreateLeave(CreateLeaveRequest $request){

        try{

            $leave = new Leave();

            $leave->Name = $request->Name;
            $leave->user_id = $request->user_id;
            $leave->Reason = $request->Reason;
            $leave->Start_date = $request->Start_date;
            $leave->End_date = $request->End_date;
            $leave->create_id = auth()->user()->id;

            $leave->save();

            return response()->json([
                'status_code' => 200,
                'message' => 'Leave ajoute avec succes',
                'leave' => $leave
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

    }

    public function UpdateLeave(UpdateLeaveRequest $request, Leave $leave){

        try{

            $leave->Name = $request->Name;
            $leave->user_id = $request->user_id;
            $leave->Reason = $request->Reason;
            $leave->Start_date = $request->Start_date;
            $leave->End_date = $request->End_date;
            $leave->create_id = auth()->user()->id;

            $leave->save();

            return response()->json([
                'status_code' => 200,
                'message' => 'Leave mis a jour avec succes',
                'leave' => $leave
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

    }

    public function DeleteLeave(Leave $leave){

        try{
            $leave->delete();
            return response()->json([
                'status_code' => 200,
                'message' => 'Leave supprime avec succes',
                'leave' => $leave
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

    }



}
