<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcademicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $ac = Academic::where("user_id", "=", $id)->count();
        $acDetails = Academic::where('user_id', $id)->first();

        if($ac == 0){
            return view('apps.academic', ['id' => $id]);
        }

        else{
            return view('apps.editAcademic', ['id' => $id, 'acDetails' => $acDetails]);
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
            ['major' => $request->input('major')],
            ['grade' => $request->input('grade')],
            ['level' => $request->input('level')],
            ['graduated' => $request->input('graduated')]
    ]);
    $lp = $lp->toArray();
    // dd($lp);

    $instName = $lp[0]['instName'];
    $startDate= $lp[1]['startDate'];
    $endDate = $lp[2]['endDate'];
    $course = $lp[3]['course'];
    $major = $lp[4]['major'];
    $grade = $lp[5]['grade'];
    $level = $lp[6]['level'];
    $graduated = $lp[7]['graduated'];

    // dd($currJob);

    DB::beginTransaction();

    $academic = Academic::updateOrCreate([
        'user_id' => Auth::user()->id],
        ['instName' => $instName,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'course' => $course,
        'major' => $major,
        'grade' => $grade,
        'level' => $level,
        'graduated' => $graduated
    ]);
    // dd($experience);
    DB::commit();

 return redirect('/certifications');
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
