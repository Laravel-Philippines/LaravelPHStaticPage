<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;
use App\User;
use App\Job;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //validate
        $this->validate($request, [
        'job_title' => 'required||min:10|max:255',
        'job_description' => 'min:10|max:500|required',
        'job_requirements' => 'min:10|max:500|required',
        'remote' => 'required|boolean',    
        'fulltime' => 'required|boolean',
         ]);
         
        //insert
        $job = new Job;
        $job->title = $request->job_title;
        $job->fulltime = $request->fulltime;
        $job->remote = $request->remote;
        $job->description = $request->job_description;
        $job->user_id = $request->user()->id;
        $job->requirements = $request->job_requirements;
        $job->save();
        Session::flash('message', "Gratz Bro/Sis! Job Saved.");
        return redirect('dashboard');
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
        $job = Job::where('id',$id)->first();

        return view('jobs.edit')->with('job',$job);
        
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
        //TODO

        //validate
        $this->validate($request, [
        'job_title' => 'required||min:10|max:255',
        'job_description' => 'min:10|max:500|required',
        'job_requirements' => 'min:10|max:500|required',
        'remote' => 'required|boolean',    
        'fulltime' => 'required|boolean',
         ]);
        
        $job_id = $request->input('job_id');
        
        $job = Job::findOrFail($job_id);
        
        if ($job->user_id != Auth::user()->id)
            return redirect('/events/'.$event->slug .'/edit')->withErrors('You are not allowed to edit this event.')->withInput();
        
        //insert
        $job->title = $request->job_title;
        $job->fulltime = $request->fulltime;
        $job->remote = $request->remote;
        $job->description = $request->job_description;
        $job->user_id = $request->user()->id;
        $job->requirements = $request->job_requirements;
        $job->save();
        Session::flash('message', "Gratz Bro/Sis! Job Successfully Updated.");
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        
        if($job && ($job->user_id == $request->user()->id))
        {
          $job->delete();
          Session::flash('message', "Job deleted.");
          return redirect('dashboard');
        }
        else 
        {
          return redirect('dashboard')->withErrors('You have no permission to delete this event.');
        }
    }
}
