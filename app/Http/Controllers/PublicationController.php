<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function PublicationView()
    {
        return view ('publication.landingpublication');
    }

    public function showList()
    {
        $publications = Publication::all();
        return view('publication.listpublication', compact('publications'));
    }
}
