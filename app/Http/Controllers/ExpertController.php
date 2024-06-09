<?php
  
namespace App\Http\Controllers;
  

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Expert;
use App\Models\Expert_research;
use App\Models\Expert_paper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;

  
class ExpertController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$regID = $request->query('RegID');
       
        if (session('platinum')) {
            $experts = Expert::query()
                ->where('RegID', session('platinum'))
                ->when(
                    $request->search,
                    function (Builder $builder) use ($request) {
                        $builder->where('eName', 'like', "%{$request->search}%")
                            ->orWhere('eInstitution', 'like', "%{$request->search}%")
                            ->orWhere('eEmail', 'like', "%{$request->search}%")
                            ->orWhere('ePhone', 'like', "%{$request->search}%");
                    }
                )->paginate(5);
        } else {
            // For other users, you can handle differently or return an empty collection
            $experts = collect();
        }
    
        return view('experts.index', compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createStep1() 
    {
        $regID = session('platinum');
        //$id = session('platinum');
        //$registration = Registration::where('RegID', $id)->first();
        //$registrations = \App\Models\Registration::all();
        return view('experts.create-step1', compact('regID'));
    }

    public function postCreateStep1(Request $request)
    {
        $regID = session('platinum');
       // $id = session('platinum');
        //$registration = Registration::where('RegID', $id)->first();
       // $registrations = \App\Models\Registration::all();
        $request->validate([
            'eName' => 'required',
            'eInstitution' => 'required',
            'eEmail' => 'required|email',
            'ePhone' => 'required',
            //'RegID' => 'required|exists:registration,RegID'
        ]);

        $expertData = $request->only(['eName', 'eInstitution', 'eEmail', 'ePhone']);
        $expertData['RegID'] = $regID;
        $request->session()->put('expert', $expertData);

        return redirect()->route('experts.create.step2');
    }

    public function createStep2()
    {
        return view('experts.create-step2');
    }

    public function postCreateStep2(Request $request)
    {
        $request->validate([
            'researchTitle' => 'required|array',
            'researchTitle.*' => 'required|string',
            'researchDomain' => 'required|array',
            'researchDomain.*' => 'required|string',
        ]);

        $researchData = $request->only(['researchTitle', 'researchDomain']);
        $request->session()->put('research', $researchData);

        return redirect()->route('experts.create.step3');
    }

    public function createStep3()
    {
        return view('experts.create-step3');
    }

    public function postCreateStep3(Request $request)
    {
        $request->validate([
            'paperTitle' => 'required|array',
            'paperTitle.*' => 'required|string',
            'paperYear' => 'required|array',
            'paperYear.*' => 'required|numeric',
            'paperType' => 'required|array',
            'paperType.*' => 'required|string',
        ]);

        $paperData = $request->only(['paperTitle', 'paperYear', 'paperType']);
        $request->session()->put('paper', $paperData);
        $expertData = $request->session()->get('expert');
        $researchData = $request->session()->get('research');
        $paperData = $request->session()->get('paper');


        $expert = Expert::create($expertData);


        foreach ($researchData['researchTitle'] as $index => $title) {
            Expert_research::create([
                'eResearchTitle' => $title,
                'eDomain' => $researchData['researchDomain'][$index],
                'expertID' => $expert->expertID,
            ]);
        }

        foreach ($paperData['paperTitle'] as $index => $title) {
            Expert_paper::create([
                'ePaperTitle' => $title,
                'eYear' => $paperData['paperYear'][$index],
                'ePublicationType' => $paperData['paperType'][$index],
                'expertID' => $expert->expertID,
                'eResearchID' => Expert_research::where('expertID', $expert->expertID)->first()->eResearchID,
            ]);
        }

        return redirect()->route('experts.index')->with('success', 'Expert added successfully.');
    }

    public function allExperts(Request $request)
    {
        $query = Expert::query();

         if ($request->filled('search')) {
             $searchTerm = $request->search;
            $query->whereHas('researches', function ($researchQuery) use ($searchTerm) {
            $researchQuery->where('eDomain', 'like', '%' . $searchTerm . '%');
        });
        }

        $allExperts = $query->paginate(5);

         return view('experts.allExpert', compact('allExperts'));
    }   
  
    /**
     * Display the specified resource.
     */
    public function show(Expert $expert): View
    {
        return view('experts.show',compact('expert'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expert $expert): View
    {
        return view('experts.edit',compact('expert'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expert $expert): RedirectResponse
    {
        $request->validate([
            'eName' => 'required',
            'eInstitution' => 'required',
            'eEmail' => 'required',
            'ePhone' => 'required',
        ]);
        
        $expert->update($request->all());
        
        return redirect()->route('experts.index')
                        ->with('success','Expert updated successfully');
    }

    public function mentorExpert(Request $request): View
    {
        // Retrieve all experts from the database
        $experts = Expert::query()
            ->when($request->has('domain'), function ($query) use ($request) {
                $query->where('eDomain', 'like', '%' . $request->input('domain') . '%');
            })
            ->paginate(10);

        return view('experts.mentorExpert', compact('experts'));
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expert $expert): RedirectResponse
    {
        $expert->delete();
         
        return redirect()->route('experts.index')
                        ->with('success','Expert deleted successfully');
    }
}