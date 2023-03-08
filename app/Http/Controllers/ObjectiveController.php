<?php

namespace App\Http\Controllers;

use App\Models\Objectives;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Objectives::all();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        
        return Objectives::create($request->all());
       

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
        $response = Objectives::find($id);
        $response->update($request->all());
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Objectives::destroy($id);

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
