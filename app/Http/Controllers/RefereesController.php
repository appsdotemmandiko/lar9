<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referees;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RefereesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $ref = Referees::where("user_id", "=", $id)->count();
        $refDetails = Referees::where('user_id', $id)->first();

        if($ref == 0){
            return view('apps.referees', ['id' => $id]);
        }

        else{
            return view('apps.editReferees', ['id' => $id, 'refDetails' => $refDetails]);
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
            ['name' => $request->input('name')],
            ['occupation' => $request->input('occupation')],
            ['address' => $request->input('address')],
            ['code' => $request->input('code')],
            ['town' => $request->input('town')],
            ['mobile' => $request->input('mobile')],
            ['email' => $request->input('email')],
            ['period' => $request->input('period')]
    ]);
    $lp = $lp->toArray();
    // dd($lp);

    $name = $lp[0]['name'];
    $occupation= $lp[1]['occupation'];
    $address = $lp[2]['address'];
    $code = $lp[3]['code'];
    $town = $lp[4]['town'];
    $mobile = $lp[5]['mobile'];
    $email = $lp[6]['email'];
    $period = $lp[7]['period'];

    // dd($currJob);

    DB::beginTransaction();

    $academic = Referees::updateOrCreate([
        'user_id' => Auth::user()->id],
        ['name' => $name,
        'occupation' => $occupation,
        'address' => $address,
        'code' => $code,
        'town' => $town,
        'mobile' => $mobile,
        'email' => $email,
        'period' => $period
    ]);
    // dd($experience);
    DB::commit();

 return redirect('/jobs');
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
