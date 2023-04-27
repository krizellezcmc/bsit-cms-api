<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Memo;


class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Memo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $memo = new Memo;
        $memo-> access = $request->access ?? 3; 
        $memo-> title = $request->title; 
        $memo-> description = $request->description;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $path = $file->store('public');
            $fileName = explode('/', $path, 2);
            $file->move(public_path('storage'), $fileName[1]);
            $new_path = 'localhost:8000/storage/'.$fileName[1];
            $memo->files = $new_path;  
            $memo->file_name = $name;   
        }

        $insert = $memo->save();
        if ($insert) {
            return response()->json([
                'status' => 1,
                'message' => 'Success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Memo::find($id);
    }

    public function showAccess(string $access)
    {
        return DB::table('memos')
        ->where('access', $access)
        ->orWhere('access', 3)
        ->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Memo::find($id);
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
        $response = Memo::destroy($id);

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
