<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;

use App\Http\Controllers\Auth;

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
        $event_startdate_formatted = date('Y-m-d H:i', strtotime($event_startdate));
        $event_enddate = $request->event_enddate;
        $event_enddate_formatted = date('Y-m-d H:i', strtotime($event_enddate));
        
        //insert
        $event = new Event;
        $event->title = $request->event_title;
        $event->description = $request->event_description;
        $event->event_startdatetime = $event_startdate_formatted;
        $event->event_enddatetime = $event_enddate_formatted;
        $event->user_id = $request->user()->id;
        $event->slug = str_slug($request->event_title);
        $event->save();
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
         /*  
        $post = Posts::where('slug',$slug)->first();
        if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
          return view('posts.edit')->with('post',$post);
        return redirect('/')->withErrors('you have not sufficient permissions');
        
        
        return $slug;
        
        */
        $event = Event::where('slug',$slug)->first();
        
        // return var_dump($event);
        
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
