<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use App\Model\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Places = Place::paginate(20);
        return view('admin.place.index',compact('Places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::get();
        $Cities = City::where('country_id','223')->get();
        return view('admin.place.create',compact('Countries','Cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Place = new Place;
        foreach($request->except('_token','lat','lng') as $key => $value){
            $Place->$key = $value;
        }
        $Place->coordinates = json_encode($request->get('coordinates'));
        $Place->save();
        return redirect()->route('place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return $place;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Place = Place::findOrFail($id);
        $Countries = Country::get();
        $Cities = City::where('country_id',$Place->country)->get();
        return view('admin.place.edit',compact('Place','Countries','Cities'));
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
        $Place = Place::findOrFail($id);
        foreach($request->except('_token','_method','lat','lng') as $key => $value){
            $Place->$key = $value;
        }
        $Place->coordinates = json_encode($request->get('coordinates'));
        $Place->save();
        return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        Log::info($place->name.' isimli mekan '.Auth::user()->username.' tarafından silindi');
        $place->delete();
        return redirect()->route('place.index');
    }
}
