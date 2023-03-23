<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

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
         
        $response = Faculty::create($request->post());

        

        return $response;

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
