<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Activity::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Activity::create($request->post());
        return $response;

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
    public function show(string $id)
    {
        return Activity::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Activity::find($id);
        $response->update($request->all());
        return $response;

        
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
    public function destroy(string $id)
    {
        $response = Activity::destroy($id);

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
