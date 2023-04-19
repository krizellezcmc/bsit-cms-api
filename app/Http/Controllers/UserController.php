<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    public function register(Request $request)
    {

        $insert =  User::create([
            'fname' => $request->fname,
            'mi' => $request->mi,
            'lname' => $request->lname,
            'role' => $request->role,
            'year' => $request->year,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

      
        if ($insert) {
            $res = response()->json(
                [
                    'message' => 'success',
                ],
                200
            );
        } else {
            $res = response()->json(
                [
                    'message' => 'failed',
                ],
                409
            );
        }

        return $res;
   
       
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['status' => 1, 'user' => $user], 200);
        } else {
            return response()->json(['status' => 0, 'error' => 'Unauthorized'], 401);
        }
        
    // {
    //     $user = array(
    //         'email'  => $request->email,
    //         'password' => $request->password
    //        );

    //        if(User::attempt($user))
    //        {
    //             return 'success';
    //        }
           
    //        else
    //        {
    //         return 'error';
    //        }
        // if ($insert) {
        //     $res = response()->json(
        //         [
        //             'message' => 'success',
        //         ],
        //         200
        //     );
        // } else {
        //     $res = response()->json(
        //         [
        //             'message' => 'failed',
        //         ],
        //         409
        //     );
        // }

        // return $res;
   
       
    }

    public function addAdmin() {
        $insert =  User::create([
            'fname' => 'Admin',
            'mi' => '-',
            'lname' => '-',
            'role' => 0,
            'year' => '-',
            'email' => 'admin_ccs@gmail.com',
            'password' => Hash::make('admin_ccs'),
        ]);

      
        if ($insert) {
            return response()->json(
                [
                    'message' => 'Admin Created',
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'message' => 'failed',
                ],
                409
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
