<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalBodies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfessionalBodiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $prof = ProfessionalBodies::where("user_id", "=", $id)->count();
        $profDetails = ProfessionalBodies::where('user_id', $id)->first();

        if($prof == 0){
            return view('apps.professionalbodies', ['id' => $id]);
        }
        else{
            return view('apps.editProfessionalBodies', ['id' => $id, 'profDetails' => $profDetails]);
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
            ['body' => $request->input('body')],
            ['regNo' => $request->input('regNo')],
            ['type' => $request->input('type')],
            ['renewal' => $request->input('renewal')]
    ]);
    $lp = $lp->toArray();
    // dd($lp);

    $body = $lp[0]['body'];
    $regNo= $lp[1]['regNo'];
    $type = $lp[2]['type'];
    $renewal = $lp[3]['renewal'];

    DB::beginTransaction();

    $prof = ProfessionalBodies::updateOrCreate([
        'user_id' => Auth::user()->id],
        ['body' => $body,
        'regNo' => $regNo,
        'type' => $type,
        'renewal' => $renewal
    ]);
    // dd($prof);
    DB::commit();

 return redirect('/');
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
