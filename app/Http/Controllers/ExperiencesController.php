<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $exp = Experience::where("user_id", "=", $id)->count();
        $expDetails = Experience::where('user_id', $id)->first();

        if($exp == 0){
            return view('apps.experience', ['id' => $id]);
        }

        else{
            return view('apps.editExperience', ['id' => $id, 'expDetails' => $expDetails]);
        }
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
        $lp= collect([
                ['orgName' => $request->input('orgName')],
                ['designation' => $request->input('designation')],
                ['startDate' => $request->input('startDate')],
                ['currJob' => $request->input('currJob')],
                ['endDate' => $request->input('endDate')],
                ['grade' => $request->input('grade')],
                ['terms' => $request->input('terms')]
        ]);
        $lp = $lp->toArray();
        // dd($lp);

        $orgName = $lp[0]['orgName'];
        $designation = $lp[1]['designation'];
        $startDate = $lp[2]['startDate'];
        $currJob = $lp[3]['currJob'];
        $endDate = $lp[4]['endDate'];
        $grade = $lp[5]['grade'];
        $terms = $lp[6]['terms'];

        // dd($currJob);

        DB::beginTransaction();

        $experience = Experience::updateOrCreate([
            'user_id' => Auth::user()->id],
            ['orgName' => $orgName,
            'designation' => $designation,
            'startDate' => $startDate,
            'currJob' => $currJob,
            'endDate' => $endDate,
            'grade' => $grade,
            'terms' => $terms
        ]);
        // dd($experience);
        DB::commit();

     return redirect('/duties');
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
        //
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
}
