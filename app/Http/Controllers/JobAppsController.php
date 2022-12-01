<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApp;
use App\Models\Job;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;



class JobAppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        return view('apps.uploads', ['id' => $id]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $request->validate([
            'cv' => 'mimes:pdf,doc,docx,odt|max:5048',
            'cover' => 'mimes:pdf,doc,docx,odt|max:5048',
            'licence' => 'mimes:pdf,doc,docx,odt|max:5048'
        ],[
            'cv.mimes' => 'Uploaded CV document must be a pdf odt or doc file',
            'cv.max' => 'CV file is too large. Upload a file under 5mb',
            'cover.mimes' => 'Uploaded cover letter document must be a pdf odt or doc file',
            'cover.max' => 'Cover letter file is too large. Upload a file under 5mb',
            'licence.mimes' => 'Uploaded licence document must be a pdf odt or doc file',
            'licence.max' => 'Licence file is too large. Upload a file under 5mb'
        ]);

        $job_id = $request->job_id;
        $user_id = Auth::user()->id;
        $cv = $job_id.'-cv'.$user_id.'-'.time().$request->file('cv')->extension();
        $cover = $job_id.'-cover'.$user_id.'-'.time().$request->file('cv')->extension();
        $licence = $job_id.'-licence'.$user_id.'-'.time().$request->file('cv')->extension();

        $cvPath = $request->cv->move(public_path('j_apps'), $cv);
        $coverPath = $request->cover->move(public_path('j_apps'), $cover);
        $licencePath = $request->licence->move(public_path('j_apps'), $licence);

        $jobapp = JobApp::updateOrCreate([
            'job_id' => $job_id],
            ['user_id' => $user_id,
            'cv' => $cv,
            'cover' => $cover,
            'licence' => $licence
        ]);

        return back()->with('status', 'Application Submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
