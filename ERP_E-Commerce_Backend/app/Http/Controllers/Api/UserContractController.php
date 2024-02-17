<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contract\CreateContractRequest;
use App\Http\Requests\Contract\UpdateContractRequest;
use App\Models\UserContract;
use Exception;
use Illuminate\Http\Request;

class UserContractController extends Controller
{
    public function ReadAllContract()
    {
        try {
            return response()->json([
                'status_code' => 200,
                'message' => 'All Contract',
                'contract' => UserContract::all()
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function ReadContract(UserContract $userContract)
    {
        try {
            return response()->json([
                'status_code' => 200,
                'message' => 'Contract',
                'contract' => $userContract
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function CreateContract(CreateContractRequest $request)
    {

        try {

            $contract = new UserContract();

            $contract->Name = $request->Name;
            $contract->Description = $request->Description;
            $contract->Salary = $request->Salary;
            $contract->user_id = $request->user_id;
            $contract->create_id = auth()->user()->id;

            $contract->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le contrat a ete enregistre',
                'data' => $contract
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function UpdateContract(UpdateContractRequest $request, UserContract $contract)
    {

        try {

            $contract->Name = $request->Name;
            $contract->Description = $request->Description;
            $contract->Salary = $request->Salary;
            $contract->user_id = $request->user_id;
            $contract->create_id = auth()->user()->id;

            $contract->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le contrat a ete mis a jour',
                'data' => $contract
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function DeleteContract(UserContract $contract)
    {

        try {

            $contract->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le contrat a ete supprime',
                'data' => $contract
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

}
