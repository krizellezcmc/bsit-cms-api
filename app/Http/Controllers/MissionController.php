<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
   public function index()
    {
        return Mission::all();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        
        return Mission::create($request->all());
       

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
    public function update(Request $request, $id)
    {
        $response = Mission::find($id);
        $response->update($request->all());
        return $response;
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy($id)
    {
        $response = Mission::destroy($id);

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
