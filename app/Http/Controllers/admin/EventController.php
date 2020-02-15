<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\City;
use App\Model\Country;
use App\Model\Currency;
use App\Model\Event;
use App\Model\EventPrice;
use App\Model\Organizer;
use App\Model\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Events = Event::paginate(20);
        return view('admin.event.index',compact('Events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Places = Place::get();
        $Categories = Category::MainCategory()->get();
        $Organizers = Organizer::get();
        $Countries = Country::get();
        $Cities = City::where('country_id',1)->get();
        return view('admin.event.create',compact('Places','Categories','Organizers','Countries','Cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = base64_encode(file_get_contents($request->file('poster')));
        $Event = Event::create($request->except('_token','dates','poster'));
        if($Event){
            $dates = explode('-',$request->get('dates'));
            $EditEvent = Event::findOrFail($Event->id);
            $EditEvent->date = $dates;
            $EditEvent->poster = $image;
            $EditEvent->save();
            return redirect()->route('event.ticket.price.new',$Event->id);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Event = Event::findOrFail($id);
        $Categories = Category::MainCategory()->get();
        $SubCategories = Category::where('sub_category',$Event->category)->get();
        $Organizers = Organizer::get();
        $Countries = Country::get();
        $Cities = City::where('country_id',$Event->Place->country)->get();
        $Places = Place::where('city',$Event->Place->city)->get();

        return view('admin.event.edit',compact('Event','Places','Categories','Organizers','Countries','Cities','SubCategories'));
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
        $Event = Event::findOrFail($id)->update($request->except('_token','dates','poster'));
        if($Event){
            $dates = explode('-',$request->get('dates'));
            $EditEvent = Event::findOrFail($id);
            $EditEvent->date = $dates;
            $EditEvent->save();
            return redirect()->route('event.ticket.price',$id);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Log::info($event->title.' başlıklı etkinlik '.Auth::User()->username.' tarafından silindi.');
        $event->prices()->delete();
        $event->delete();
        return redirect()->route('event.index');
    }

    public function prices($id){
        $Event = Event::findOrFail($id);
        $EventPrices = EventPrice::where('event_id',$id)->get();
        return view('admin.event.price.index',compact('Event','EventPrices'));
    }

    public function newPrices($id){
        $Event = Event::findOrFail($id);
        $Currencies = Currency::get();
        return view('admin.event.price.create',compact('Event','Currencies'));
    }

    public function priceStore(Request $request,$id){
        $Price = EventPrice::create($request->except('_token'));
        if($Price){
            return redirect()->route('event.ticket.price',$id);
        }else{
            return redirect()->back();
        }
    }

    public function priceDelete($id){
        $price = EventPrice::findOrFail($id);
        $price->delete();
        return redirect()->back();
    }

    public function priceEdit($id)
    {
        $EventPrice = EventPrice::findOrFail($id);
        $Event = $EventPrice->event;
        $Currencies = Currency::get();
        return view('admin.event.price.edit',compact('EventPrice','Event','Currencies'));
    }

    public function priceUpdate(Request $request,$id){
        $EventPrice = EventPrice::findOrFail($id)->update($request->except('_method','_token','event_id'));
        if($EventPrice){
            return redirect()->route('event.ticket.price',$request->get('event_id'));
        }else{
            return redirect()->back();
        }
    }
}
