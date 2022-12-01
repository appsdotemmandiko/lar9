<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
// use App\Exceptions\Handler;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('expiry', '>=', date('Y-m-d H:i:s'))
                ->get();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
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
            'ref' => 'required | unique:jobs',
            'title' => 'required',
            'description' => 'required',
            'expiry' => 'required'
        ],[
            'expiry.required' => 'The application deadline is required.',
            'ref.unique' => 'That reference number already exists.'
        ]);
         
        $job = Job::create([
            'ref' => $request->input('ref'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'expiry' => $request->input('expiry')
        ]);

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
        $job = Job::find($id);

        return view('jobs.view')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $job = Job::find($id);
        
        return view('jobs.edit')->with('job', $job);
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
        $job = Job::where('id', $id)
                    ->update([
                        'ref' => $request->input('ref'),
                        'title' => $request->input('title'),
                        'description' => $request->input('description'),
                        'expiry' => $request->input('expiry')
                    ]);
        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/jobs');
    }
    public function apply($id)
    {
        var_dump($id);
        $job = Job::find($id);
        
        return view('apps.uploads')->with('job', $job);
    }
    
}
