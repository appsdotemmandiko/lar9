<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $crt = Certification::where("user_id", "=", $id)->count();
        $crtDetails = Certification::where('user_id', $id)->first();

        if($crt == 0){
            return view('apps.certifications', ['id' => $id]);
        }

        else{
            return view('apps.editCertifications', ['id' => $id, 'crtDetails' => $crtDetails]);
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
            ['instName' => $request->input('instName')],
            ['startDate' => $request->input('startDate')],
            ['endDate' => $request->input('endDate')],
            ['course' => $request->input('course')],
            ['award' => $request->input('award')],
            ['major' => $request->input('major')],
            ['grade' => $request->input('grade')]
    ]);
    $lp = $lp->toArray();
    // dd($lp);

    $instName = $lp[0]['instName'];
    $startDate= $lp[1]['startDate'];
    $endDate = $lp[2]['endDate'];
    $course = $lp[3]['course'];
    $award = $lp[4]['award'];
    $major = $lp[5]['major'];
    $grade = $lp[6]['grade'];

    DB::beginTransaction();

    $cert = Certification::updateOrCreate([
        'user_id' => Auth::user()->id],
        ['instName' => $instName,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'course' => $course,
        'award' => $award,
        'major' => $major,
        'grade' => $grade
    ]);
    // dd($experience);
    DB::commit();

 return redirect('/professionalbodies');
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
