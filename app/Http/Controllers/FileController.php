<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    public function index()
    {
        return File::all();
    }

    /** 
     * Store a newly created resource in storage.
     */

    public function upload(Request $request)
    {
        $public_path = Storage::path('public/uploads');
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $path = $file->store('public');
            $fileName = explode('/', $path, 2);
            // $fileName = time() . '_' . $name;
            $file->move(public_path('storage'), $fileName[1]);
            // $path = '/uploads/' . $fileName; 


            $new_path = 'localhost:8000/storage/'.$fileName[1];

            // SAVE TO DB
            $upload_file = new File;
            $upload_file->name = $name;
            $upload_file->file_name = $new_path;   
            $upload_file->file_type = $file->getClientOriginalExtension();
            $upload_file->other_details = $request->others ?? '';
            $insert = $upload_file->save();
    
            if ($path && $insert) {
                return response()->json([
                    'status' => 1,
                    'message' => 'File uploaded successfully',
                    'path' => $new_path
                ]);
            }
            
        }
    
        return response()->json([
            'message' => 'File upload failed'
        ], 400);


        // $upload_file = new File;
        // $file = $request->file('file');
        // $originalName = $file->getClientOriginalName();
        // $fileType = $file->getClientOriginalExtension();
        // $path = $file->store('uploads', 'public');
        // // return response()->json(['path' => $path, 'original_name' => $originalName, 'file_type' => $fileType]);
    
        
        // // SAVE TO DB
        // $upload_file->name = $originalName;
        // $upload_file->file_name = $path;    
        // $upload_file->file_type = $fileType;
        // $upload_file->other_details = $request->others;
        // $upload_file->save();
    
        // return response()->json(['message' => 'File uploaded', 'data' => $upload_file]);
        // $response = File::create($request->post());
        // return $response;


        // if ($response) {
        //     $response = [
        //         'status' => 200,
        //         'message' => 'Successfully recorded'
        //     ];
        // }  else {
        //     $response = [
        //         'status' => 404,
        //         'message' => 'Unable to record data'
        //     ];
        // }
    }

    public function show($file_name)
    {
        $path = storage_path('app/public/' . $file_name);
        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found.'], 404);
        }
        return response()->json(['path' => $path]);
    }

    public function download($file_name)
    {
        $path = $file_name;
        $filename = basename($file_name);
        return response()->download(storage_path('app/public/uploads/' . $path), $filename);
        // $path = storage_path('app/public/uploads/' . $file_name);

        // return response()->json(['path' => $path]);
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = File::find($id);
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
    public function destroy($id)
    {
        $response = File::destroy($id);

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
