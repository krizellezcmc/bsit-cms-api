<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Link::all();
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {
        $response = Link::create($request->post());

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
        return Link::find($id);
    }


    public function linkAccess(string $access)
    {
        return DB::table('links')
        ->where('access', $access)
        ->orWhere('access', 3)
        ->get();
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, string $id)
    {
        $res = Link::find($id);
        $res->update($request->all());
        
        
        if ($res) {
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

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Link::destroy($id);

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
