<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function index()
    {
        return Faculty::all();
    }

    /** 
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $Faculty = Faculty::create($request->post());
        
        if ($Faculty) {
            $response = User::create([
                'fname' => $Faculty->fname,
                'mi' => $Faculty->mi,
                'lname' => $Faculty->lname,
                'year' => '-',
                'email' =>  Str::lower($Faculty->lname.'_'.$Faculty->fname.'@wmsu.ccs'),
                'password' => Hash::make('@ccs2016'),
                'role' => 1
            ]);

            if ($response) {
                $response = [
                    'status' => 200,
                    'message' => 'Succesfully recorded'
                ];
            }  else {
                $response = [
                    'status' => 404,
                    'message' => 'Unable to record'
                ];
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Faculty::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Faculty::find($id);
        $response->update($request->all());
        return $response;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Faculty::destroy($id);

        // if ($response) {
        //     $response = [
        //         'status' => 200,
        //         'message' => 'Succesfully deleted'
        //     ];
        // }  else {
        //     $response = [
        //         'status' => 404,
        //         'message' => 'Unable to delete record'
        //     ];
        // }

        return $response;
    }
}
