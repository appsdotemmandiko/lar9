<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duties;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DutiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $profile = Duties::where("user_id", "=", $id)->count();
        $dutyDetails = Duties::where('user_id', $id)->first();

        if($profile == 0){
            return view('apps.duties', ['id' => $id]);
        }

        else{
            // dd($dutyDetails->skills);
            return view('apps.editDuties', 
                ['dutyDetails' => $dutyDetails]);
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
        $profile = Duties::updateOrCreate([
            'user_id' => Auth::user()->id],
            ['duties' => $request->input('duties'),
            'skills' => $request->input('skills')
        ]);

     return redirect('/referees');
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
