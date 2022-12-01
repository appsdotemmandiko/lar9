<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Auth::user()->name;
        $id= Auth::user()->id;
        $email = Auth::user()->email;
        $profile = Profile::where("user_id", "=", $id)->count();
        $profileDetails = Profile::where('user_id', $id)->first();

        if($profile == 0){
            return view('apps.profile', ['name' => $name, 'email' => $email]);
        }

        else{

            return view('apps.editProfile', 
                ['name' => $name, 'email' => $email, 'profileDetails' => $profileDetails]);
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
       
        $profile = Profile::updateOrCreate([
            'user_id' => Auth::user()->id],
            ['title' => $request->input('title'),
            'dob' => $request->input('dob'),
            'passportId' => $request->input('passportId'),
            'gender' => $request->input('gender'),
            'postalAdd' => $request->input('postalAdd'),
            'postalCode' => $request->input('postalCode'),
            'town' => $request->input('town'),
            'telephone' => $request->input('telephone'),
            'telephoneAlt' => $request->input('telephoneAlt'),
            'disability' => $request->input('disability'),
            'disabilityNature' => $request->input('disabilityNature'),
            'ncpwd' => $request->input('ncpwd'),
            'civilStatus' => $request->input('civilStatus'),
            'crimeOffence' => $request->input('crimeOffence'),
            'crimeNature' => $request->input('crimeNature'),
            'crimeYear' => $request->input('crimeYear'),
            'crimeDuration' => $request->input('crimeDuration'),
            'empDismissal' => $request->input('empDismissal'),
            'empDismissalReason' => $request->input('empDismissalReason'),
            'profileSession' => $request->input('profileSession')
        ]);

     return back()->with('status', 'Profile updated!');
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
