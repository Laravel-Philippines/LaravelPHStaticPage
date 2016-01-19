<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;


// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
        return view('events.create');
        
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
        'event_title' => 'required||unique:events,title|min:10|max:255',
        'event_description' => 'min:10|max:500|required',
        'event_startdate' => 'required|date',
        'event_enddate' => 'required|date',
        'event_location' => 'required|max:255',    
         ]);
        
         //format dates for mysql
        $event_startdate = $request->event_startdate;
        $event_startdate_formatted = date('Y-m-d H:i:s', strtotime($event_startdate));
        $event_enddate = $request->event_enddate;
        $event_enddate_formatted = date('Y-m-d H:i:s', strtotime($event_enddate));
        
        //insert
        $event = new Event;
        $event->title = $request->event_title;
        $event->description = $request->event_description;
        $event->event_startdatetime = $event_startdate_formatted;
        $event->event_enddatetime = $event_enddate_formatted;
        $event->user_id = $request->user()->id;
        $event->slug = str_slug($request->event_title);
        $event->location = $request->event_location;
        $event->save();
        Session::flash('message', "Gratz Bro/Sis! Event Saved.");
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
    public function edit(Request $request,$slug)
    {
        // TODO - Authoriztion
        $event = Event::where('slug',$slug)->first();
        
        return view('events.edit')->with('event',$event);
        
        /*
        if(!$event && ($request->user()->id == $event->user_id))
            
          return view('posts.edit')->with('post',$event);
        
        return redirect('/dashboard')->withErrors('you have not sufficient permissions');
        */
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
        
    //    dd($request->all());
        
        //validate
        $this->validate($request, [
        'event_title' => 'required|min:10|max:255',
        'event_description' => 'min:10|max:500|required',
        'event_startdate' => 'required|date',
        'event_enddate' => 'required|date',
        'event_location' => 'required|max:255',    
         ]);
        
         //format dates for mysql
        $event_startdate = $request->event_startdate;
        $event_startdate_formatted = date('Y-m-d H:i:s', strtotime($event_startdate));
        $event_enddate = $request->event_enddate;
        $event_enddate_formatted = date('Y-m-d H:i:s', strtotime($event_enddate));
        
        
        $event_id = $request->input('event_id');
        
        // return $event_id;
        
        $event = Event::findOrFail($event_id);
        
        
        // return Auth::user()->id;
        
        if ($event->user_id != Auth::user()->id)
        
            return redirect('/events/'.$event->slug .'/edit')->withErrors('You are not allowed to edit this event.')->withInput();
        
        // $user = Auth::user();
        
        //return $event->user_id;
        
        //return $user->id;
        
       // $this->authorize($event);
       // Gate::check('update-event', $event);
       
       // return $r;
        // $this->authorize('update', $event);
        
        
        
        //TOFIX Ayaw gumana shet!!!!
        
        // if (Gate::denies('update', $event)) {
        
             // return abort(403);
        //     dd('Sorry Bud not allowed');
       //     return abort('401', 'Not authorized---------------------------------------------------');
            // echo 'not accepted';
        // }
        
        // if ($request->user()->cannot('update-event', $event)) {
        //    abort(403);
        // }
        
       // return $request->input();
        
       // return $event;
        
        $title = $request->event_title;
        $slug = str_slug($title);
        
        // return $slug;
        
        $duplicate = Event::where('slug',$slug)->first();
        
        // return $duplicate;
    
        if($duplicate)
        {
          if($duplicate->id != $event_id)
          {
          //  return 'duplicate';
            return redirect('/events/'.$event->slug .'/edit')->withErrors('Title already exists.')->withInput();
          }
         
          /*
          else 
          {
            $event->slug = $slug;
            
            // return $event->slug;
          } 
          */
          
        }
          
        // return $event_id;
        
        $event->title = $title;
        $event->description = $request->event_description;
        $event->event_startdatetime = $event_startdate_formatted;
        $event->event_enddatetime = $event_enddate_formatted;
        $event->slug = $slug;
        $event->location = $request->event_location;
        $event->save();
        Session::flash('message', "Gratz Bro/Sis! Event Successfully Updated.");
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

   //   dd($request .  $id);
        $event = Event::findOrFail($id);
        
        if($event && ($event->user_id == $request->user()->id))
        {
          $event->delete();
          Session::flash('message', "Event deleted.");
          return Redirect::back();
        }
        else 
        {
          return redirect('dashboard')->withErrors('You have no permission to delete this event.');
        }
       
    }
}
