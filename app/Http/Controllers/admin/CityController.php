<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cities = City::paginate(20);
        return view('admin.city.index',compact('Cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::get();
        return view('admin.city.create',compact('Countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $City = City::create($request->except('_token'));
        if($City){
            return redirect()->route('city.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return $city;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $City = City::findOrFail($id);
        $Countries = Country::get();
        return view('admin.city.edit',compact('City','Countries'));
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
        $City = City::findOrFail($id)->update($request->except('_token','_method'));
        if($City){
            return redirect()->route('city.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        Log::info($city->name.' isimli şehir '.Auth::User()->username.' tarafından silindi.');
        $city->delete();
        return redirect()->route('city.index');
    }
}
