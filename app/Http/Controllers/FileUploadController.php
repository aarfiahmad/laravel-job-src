<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
   
  
    public function store(Request $request)
    {
        // Validate the file input
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf|max:4048',
        ]);

        // Handle the file upload
        if ($request->hasFile('file')) {
            // Get the file
            $file = $request->file('file');

            // Store the file (this example stores in the 'public' disk)
            $path = $file->store('uploads', 'public');

            // Optionally, save the file path in the database or perform other actions
            // ...

            return back()->with('success', 'File uploaded successfully!');
        }

        return back()->with('error', 'No file selected.');

     
}

