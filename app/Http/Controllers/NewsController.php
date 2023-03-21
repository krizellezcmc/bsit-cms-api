<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
      public function index()
    {
        return News::all();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // $request->validate([
        //     'title' => $request['title'],
        //     'description' => $request['desc'],
        //     'image' => $request['image'],
        //     'public_id' => $request['public_id']
        // ]);
        
        $response = News::create($request->post());

        if ($response) {
            $res = [
                'status' => 200,
                'message' => 'Succesfully added'
            ];
        }  else {
            $res = [
                'status' => 404,
                'message' => 'Unable to add record'
            ];
        }

        return $res;
       

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return News::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = News::find($id);
        $response->update($request->all());
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = News::destroy($id);

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
