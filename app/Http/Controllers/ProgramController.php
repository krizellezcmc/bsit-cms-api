<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
     public function index()
    {
        return Program::all();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        
        $response = Program::create($request->all());

        if ($response) {
            $response = [
                'status' => 200,
                'message' => 'Succesfully deleted'
            ];
        }  else {
            $response = [
                'status' => 404,
                'message' => 'Unable to delete record'
            ];
        }

        return $response;
       

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Program::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Program::find($id);
        $response->update($request->all());
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Program::destroy($id);

        if ($response) {
            $response = [
                'status' => 200,
                'message' => 'Succesfully deleted'
            ];
        }  else {
            $response = [
                'status' => 404,
                'message' => 'Unable to delete record'
            ];
        }

        return $response;
    }
}
