<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Activity;
use App\Models\Image;

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

        $activity = new Activity;
        $activity-> activity_name = $request['activity_name']; 
        $activity-> date_started = $request['date_started'];
        $activity-> date_ended = $request['date_ended']; 
        $activity-> location = $request['location']; 
        $activity-> link = $request['link']; 
        $activity-> description = $request['description'];
        $activity = save();
        
        foreach ($request->file('images') as $key => $file) {
            $path = $file->store('public');
            $name = explode("/",$path, 2);
            
            $files = new Image;
            $files -> name = "localhost:8000/storage/".$name[1];
            $files -> FK_activity_ID = $activity->id;
            $files -> created_at = now();
            $files -> updated_at = now();
            $files -> save();
        }

        
        
        
        // $Activity = Activity::create($request->post());


        // $image = new Image;
        // $image = 
        // $response -> path = $Activity->id;
        // return $response;

        if ($activity && $files) {
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
