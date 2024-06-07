<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function landingpublication()
    {
        return view ('publication.landingpublication');
    }

    public function showList()
    {
        return view ('publication.listpublication');
    }

    public function showUpload()
    {
        return view ('publication.uploadpublication');
    }

    public function upload(Request $request)
    {
        // Validate and handle the upload logic here
        $validated = $request->validate([
            'Pub_type' => 'required|string',
            'Pub_File' => 'required|file',
            'Pub_Title' => 'required|string',
            'Pub_author' => 'required|string',
            'Pub_date' => 'required|date',
            'Pub_DOI' => 'nullable|string',
        ]);

        // Example logic for handling the file and storing data
        $filePath = $request->file('file')->store('publications');

        Publication::create([
            'Pub_type' => $validated['Pub_type'],
            'Pub_File' => $filePath,
            'Pub_Title' => $validated['Pub_Title'],
            'Pub_author' => $validated['Pub_author'],
            'Pub_date' => $validated['Pub_date'],
            'Pub_DOI' => $validated['Pub_DOI'],
        ]);

        return redirect()->route('publication.showList')->with('success', 'Publication uploaded successfully!');
    }

    

}
