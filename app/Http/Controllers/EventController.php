<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Event;
use App\Model\Organizer;
use App\Model\Place;
use App\Model\Social;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $FavEvent = 0;
        $GoToEvent = 0;
        $Event = Event::where('slug',$slug)->with('prices','place','organizer','category','subcategory')->first();
        if(Auth::check()){
            $FavEvent = Social::where('event_id',$Event->id)->where('user_id',Auth::id())->where('type','fav')->count();
            $GoToEvent = Social::where('event_id',$Event->id)->where('user_id',Auth::id())->where('type','gidecek')->count();
        }
        $EventDate = Carbon::create(json_decode($Event->date)[1]);
        $now = Carbon::now();
        $diff_date = $EventDate->diffInDays($now,false);

        return view('frontend.event.show',compact('Event','diff_date','FavEvent','GoToEvent'));
    }

    public function category($slug){
        $Category = Category::where('slug',$slug)->first();
        return view('frontend.event.category',compact('Category'));
    }

    public function organizer($slug){
        $Organizer = Organizer::where('slug',$slug)->first();
        return view('frontend.event.organizer',compact('Organizer'));
    }

    public function place($slug){
        $Place = Place::where('slug',$slug)->first();
        return view('frontend.event.place',compact('Place'));
    }
}
