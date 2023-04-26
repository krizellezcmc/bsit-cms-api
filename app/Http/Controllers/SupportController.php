<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Support::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Support::create($request->post());
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
        return Support::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Support::find($id);
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
        $response = Support::destroy($id);

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
