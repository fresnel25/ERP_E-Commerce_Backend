<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function RegisterUser(RegisterRequest $request){
        try{
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
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

}
