<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Organizer;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Organizers = Organizer::paginate(20);
        return view('admin.organizer.index',compact('Organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = User::where('type','organizer')->get();
        return view('admin.organizer.create',compact('Users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Organizer = Organizer::create($request->except('_token'));
        if($Organizer){
            return redirect()->route('organizer.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Organizer = Organizer::findOrFail($id);
        return $Organizer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Organizer = Organizer::findOrFail($id);
        $Users = User::Organizers()->get();
        return view('admin.organizer.edit',compact('Organizer','Users'));
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
        $Organizer = Organizer::findOrFail($id)->update($request->except('_token','_method'));
        if($Organizer){
            return redirect()->route('organizer.index');
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
    public function destroy($id)
    {
        $Organizer = Organizer::findOrFail($id);
        Log::info($Organizer->name.' isimli organizatör '.Auth::User()->username.' tarafından silindi.');
        $Organizer->delete();
        return redirect()->route('organizer.index');
    }
}
