<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        return Alumni::all();
    }

    /** 
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $response = Alumni::create($request->post());

        if ($response) {
            $response = [
                'status' => 200,
                'message' => 'Successfully recorded'
            ];
        }  else {
            $response = [
                'status' => 404,
                'message' => 'Unable to record data'
            ];
        }
    }

    /** 
     * Display the specified resource.
     */
    public function show($id)
    {
        return Alumni::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Alumni::find($id);
        $response->update($request->all());

        if ($response) {
            $response = [
                'status' => 200,
                'message' => 'Record updated'
            ];
        }  else {
            $response = [
                'status' => 404,
                'message' => 'Unable to update record'
            ];
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Alumni::destroy($id);

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
