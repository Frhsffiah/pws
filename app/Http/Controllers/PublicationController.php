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
        $publications = Publication::all(); // Retrieve all publications
        return view('publication.listpublication', compact('publications'));
    }
    
    public function showUpload()
    {
        return view ('publication.uploadpublication');
    }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'Pub_type' => 'required|string|max:255',
            'Pub_File' => 'required|file|mimes:pdf,doc,docx', // add your file validation rules
            'Pub_Title' => 'required|string|max:255',
            'Pub_author' => 'required|string|max:255',
            'Pub_date' => 'required|date',
            'Pub_DOI' => 'required|string|max:255',
        ]);
    
        // Handle file upload
        if ($request->hasFile('Pub_File')) {
            $file = $request->file('Pub_File');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $fileName, 'public');
        }
    
        // Create publication
        Publication::create([
            'Pub_type' => $request->input('Pub_type'),
            'Pub_File' => $filePath ?? null, // save file path
            'Pub_Title' => $request->input('Pub_Title'),
            'Pub_author' => $request->input('Pub_author'),
            'Pub_date' => $request->input('Pub_date'),
            'Pub_DOI' => $request->input('Pub_DOI'),
            'RegID' => $request->input('RegID'),
            'Mentor_ID' => $request->input('Mentor_ID'),
        ]);
    
        return redirect()->route('Publication.showUpload')->with('success', 'Publication uploaded successfully.');
    }

public function showDelete()
{
    $publications = Publication::all(); // Retrieve all publications
    return view('publication.deletepublication', compact('publications'));
}

public function destroy(Request $request)
{
    $publicationId = $request->input('publication_id');
    Publication::where('PubID', $publicationId)->delete();
    return back()->with('success', 'Publication deleted successfully!');
}

public function edit($id)
{
    $publication = Publication::findOrFail($id);
    return view('publication.editpublication', compact('publication'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'Pub_type' => 'required|string|max:255',
        'Pub_Title' => 'required|string|max:255',
        'Pub_author' => 'required|string|max:255',
        'Pub_date' => 'required|date',
        'Pub_DOI' => 'nullable|string|max:255',
        'Pub_File' => 'nullable|file|mimes:pdf,doc,docx'
    ]);

    $publication = Publication::findOrFail($id);
    $publication->update($request->all());

    return back()->with('success', 'Publication updated successfully.');
}

public function view($id)
{
    $publication = Publication::findOrFail($id);
    return view('publication.viewpublication', compact('publication'));
}

public function showSearch(Request $request)
{
    $query = $request->input('query');
    $publications = collect(); // Initialize an empty collection

    if ($query) {
        $publications = Publication::query()
            ->where('Pub_Title', 'LIKE', "%{$query}%")
            ->orWhere('Pub_type', 'LIKE', "%{$query}%")
            ->get();
    }

    return view('publication.searchpublication', compact('publications'));
}


}