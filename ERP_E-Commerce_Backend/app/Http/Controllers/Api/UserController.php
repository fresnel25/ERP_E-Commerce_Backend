<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\Leave;
use App\Models\Post;
use App\Models\User;
use App\Models\UserContract;
use App\Models\UserMonthlyPayment;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function RegisterUser(RegisterRequest $request){
        try{
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;

            $user->save();

            return response()->json([
                'status_code' => '200',
                'message' => 'l\'utisateur a ete enregistre avec succes',
                'user' => $user
            ]);

        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function LoginUser(LoginRequest $request){
        try{
            if(auth()->attempt($request->only(['email','password']))){
                $user = auth()->user();
                $token = $user->createToken('eCommerce_key')->plainTextToken;

                return response()->json([
                    'status_code' => '200',
                    'message' => 'utilisateur connecte',
                    'user'=> $user,
                    'token' => $token
                    
                ]);

            }else{
                return response()->json([
                    'status_code' => '422',
                    'message' => 'cet utilsateur n\'exite pas',
                    
                ]);
            }

        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function getPostsByUserId( $user)
    {
        try {
            $userExist = User::where('id', $user)->exists();

           if($userExist){
            $posts = Post::where('user_id', $user)->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Posts by user ID',
                'data' => [
                    'user'=>$user,
                    'post'=>$posts
                ],
            ]);
           }
           else{
            return response()->json([
                'status_code' => 200,
                'message' => 'This user id not exists',
            ]);
           }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function getLeavesByUserId( $user)
    {
        try {
            $userExist = User::where('id', $user)->exists();

            if($userExist){
            $leave = Leave::where('user_id', $user)->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Posts by Category ID',
                'data' => [
                    'user'=>$user,
                    'leave'=>$leave
                ],
            ]);
        }
        else{
            return response()->json([
                'status_code' => 200,
                'message' => 'This user id not exists',
            ]);
           }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function getContractsByUserId( $user)
    {
        try {

            $userExist = User::where('id', $user)->exists();

            if($userExist){

            $userContract = UserContract::where('user_id', $user)->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Posts by Category ID',
                'data' => [
                    'user'=>$user,
                    'contract'=>$userContract
                ],
            ]);
        }
        else{
            return response()->json([
                'status_code' => 200,
                'message' => 'This user id not exists',
            ]);
           }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function getPaymentsByUserId( $user)
    { 
        try {

            $userExist = User::where('id', $user)->exists();

            if($userExist){

            $userPayment = UserMonthlyPayment::where('user_id', $user)->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Posts by Category ID',
                'data' => [
                    'user'=>$user,
                    'payment'=>$userPayment
                ],
            ]);
        }
        else{
            return response()->json([
                'status_code' => 200,
                'message' => 'This user id not exists',
            ]);
           }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

}
