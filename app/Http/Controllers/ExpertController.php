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
use Illuminate\Support\Facades\DB;//untuk report


  
class ExpertController extends Controller
{
    
        //page my expert list, and search
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




   //page expert detail
    public function createStep1() 
    {
        $regID = session('platinum');
        return view('experts.create-step1', compact('regID'));
    }


    //ambik data form research 
    public function postCreateStep1(Request $request)
    {
        $regID = session('platinum');
        $request->validate([
            'eName' => 'required',
            'eInstitution' => 'required',
            'eEmail' => 'required|email',
            'ePhone' => 'required',
        ]);

        $expertData = $request->only(['eName', 'eInstitution', 'eEmail', 'ePhone']);
        $expertData['RegID'] = $regID;
        $request->session()->put('expert', $expertData);

        return redirect()->route('experts.create.step2');
    }


    //page form research
    public function createStep2()
    {
        return view('experts.create-step2');
    }


    //ambik data form research 
    public function postCreateStep2(Request $request)
    {
        $request->validate([
            'researchTitle' => 'required|array',
            'researchTitle.*' => 'required|string',
            'researchDomain' => 'required|array',
            'researchDomain.*' => 'required|string',
        ]);

        $researchData = $request->only(['researchTitle', 'researchDomain']);//simpan dalam variable
        $request->session()->put('research', $researchData);//letak dalam session user, so boleh guna untuk next form

        return redirect()->route('experts.create.step3');
    }


    //page for form paper
    public function createStep3()
    {
        return view('experts.create-step3');
    }



    //ambik data form paper, and create untuk expert detail,research,paper
    public function postCreateStep3(Request $request) :RedirectResponse
    {
        $request->validate([
            'paperTitle' => 'required|array',
            'paperTitle.*' => 'required|string',
            'paperYear' => 'required|array',
            'paperYear.*' => 'required|numeric',
            'paperType' => 'required|array',
            'paperType.*' => 'required|string',
            'ePaperFile' => 'sometimes|array',
            'ePaperFile.*' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
    
        $expertData = $request->session()->get('expert');
        $researchData = $request->session()->get('research');
        $paperData = $request->only(['paperTitle', 'paperYear', 'paperType']);
        $files = $request->file('ePaperFile');
    
        $expert = Expert::create($expertData);
    
        foreach ($researchData['researchTitle'] as $index => $title) {
            $research = Expert_research::create([
                'eResearchTitle' => $title,
                'eDomain' => $researchData['researchDomain'][$index],
                'expertID' => $expert->expertID,
            ]);
    
            $paperFile = isset($files[$index]) ? $files[$index] : null;
            $filePath = null;
    
            if ($paperFile) {
                $fileName = time() . '_' . $paperFile->getClientOriginalName();
                $filePath = $paperFile->storeAs('expertpaper', $fileName, 'public');
            }
    
            Expert_paper::create([
                'ePaperTitle' => $paperData['paperTitle'][$index],
                'eYear' => $paperData['paperYear'][$index],
                'ePublicationType' => $paperData['paperType'][$index],
                'ePaperFile' => $filePath,
                'expertID' => $expert->expertID,
                'eResearchID' => $research->eResearchID,
            ]);
        }

        return redirect()->route('experts.index')->with('success', 'Expert added successfully.');
    }



    //page platinum all expert and search by domain
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
  



    //show expeert detail page
    public function show(Expert $expert): View
    {
        return view('experts.show',compact('expert'));
    }

    
  
    //edit page
    public function edit(Expert $expert): View
    {
        return view('experts.edit',compact('expert'));
    }
  



    //update expert detail,research,paper
    public function update(Request $request, Expert $expert): RedirectResponse
    {
        $request->validate([
            'eName' => 'required',
            'eInstitution' => 'required',
            'eEmail' => 'required|email',
            'ePhone' => 'required|numeric',
            'researchTitle.*' => 'nullable|string',
            'researchDomain.*' => 'nullable|string',
            'paperTitle.*' => 'nullable|string',
            'paperYear.*' => 'nullable|numeric',
            'paperType.*' => 'nullable|string',
            'ePaperFile.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240', 
        ]);

        // Update expert details
        $expert->update($request->only(['eName', 'eInstitution', 'eEmail', 'ePhone']));

        // Update or create research
        if ($request->has('researchTitle')) {
            foreach ($request->researchTitle as $key => $title) {
                $research = $expert->researches()->findOrNew($request->researchID[$key] ?? null);
                $research->eResearchTitle = $title;
                $research->eDomain = $request->researchDomain[$key];
                $research->save();
            }
        }

        // Update or create papers
        if ($request->has('paperTitle')) {
            foreach ($request->paperTitle as $key => $title) {
                $paper = $expert->papers()->findOrNew($request->paperID[$key] ?? null);//kalau jumpa sama, takyah buat baru
                $paper->expertID = $expert->expertID; //assign expert id kalau buat baru
                $paper->ePaperTitle = $title;
                $paper->eYear = $request->paperYear[$key];
                $paper->ePublicationType = $request->paperType[$key];
                
                // Handle file upload
                if ($request->hasFile('ePaperFile.'.$key)) {
                    $file = $request->file('ePaperFile.'.$key); // Assuming 'ePaperFile' is the name of your file input field
                    $filename = time() . '_' . $file->getClientOriginalName(); // Get the original file name
                    $filePath = $file->storeAs('expertpaper', $filename, 'public'); // Store the file to the specified disk and path 
                    $paper->ePaperFile = $filePath;
                    $paper->save();
                    
                }
                
                $paper->save();
            }
        }

        return redirect()->route('experts.index')->with('success', 'Expert updated successfully');
    }




    //page mentor expert list
    public function mentorExpert(Request $request)
    {
        $query = Expert::query();

         if ($request->filled('search')) {
             $searchTerm = $request->search;
            $query->whereHas('researches', function ($researchQuery) use ($searchTerm) {
            $researchQuery->where('eDomain', 'like', '%' . $searchTerm . '%');
        });
        }

        $allExperts = $query->paginate(5);

         return view('experts.mentorExpert', compact('allExperts'));
    }   



    //page show expert detail
    public function mentorShow(Expert $expert): View
    {
        return view('experts.mentorShow',compact('expert'));
    }
   
  


    //delete expert
    public function destroy(Expert $expert): RedirectResponse
    {
        $expert->delete();
         
        return redirect()->route('experts.index')
                        ->with('success','Expert deleted successfully');
    }



    //report
    public function institutionReport()
    {
        // Retrieve data from the database
        $expertCounts = Expert::query()
            ->select('eInstitution', DB::raw('COUNT(*) as count'))
            ->groupBy('eInstitution')
            ->orderByDesc('count')
            ->limit(10) // Limit to top 10 institutions
            ->get();

        // Prepare data for chart
        $labels = $expertCounts->pluck('eInstitution');
        $counts = $expertCounts->pluck('count');

        return view('experts.institution_report', compact('labels', 'counts'));
    }


}