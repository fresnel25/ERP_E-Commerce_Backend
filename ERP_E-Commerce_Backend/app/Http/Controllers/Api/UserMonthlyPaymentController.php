<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\CreatePaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Models\UserMonthlyPayment;
use Exception;
use Illuminate\Http\Request;

class UserMonthlyPaymentController extends Controller
{
    public function ReadAllPayment()
    {
        try {
            return response()->json([
                'status_code' => 200,
                'message' => 'All Payments',
                'contract' => UserMonthlyPayment::all()
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function ReadPayment(UserMonthlyPayment $userMonthlyPayment)
    {
        try {
            return response()->json([
                'status_code' => 200,
                'message' => 'payment',
                'payment' => $userMonthlyPayment
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function CreateContract(CreatePaymentRequest $request)
    {

        try {

            $userMonthlyPayment = new UserMonthlyPayment();

            $userMonthlyPayment->Name = $request->Name;
            $userMonthlyPayment->Amount = $request->Description;
            $userMonthlyPayment->user_id = $request->user_id;
            $userMonthlyPayment->create_id = auth()->user()->id;

            $userMonthlyPayment->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le payment a ete enregistre',
                'data' => $userMonthlyPayment
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function UpdateContract(UpdatePaymentRequest $request, UserMonthlyPayment $userMonthlyPayment)
    {

        try {

            $userMonthlyPayment->Name = $request->Name;
            $userMonthlyPayment->Amount = $request->Description;
            $userMonthlyPayment->user_id = $request->user_id;
            $userMonthlyPayment->create_id = auth()->user()->id;

            $userMonthlyPayment->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le contrat a ete mis a jour',
                'data' => $userMonthlyPayment
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function DeleteContract(UserMonthlyPayment $userMonthlyPayment)
    {

        try {

            $userMonthlyPayment->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le contrat a ete supprime',
                'data' => $userMonthlyPayment
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
