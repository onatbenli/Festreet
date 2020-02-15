<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Model\Social;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $User = User::findOrFail(Auth::id())->update($request->except('_token'));
        if($User){
            Helper::alert('Profiliniz Başarıyla Güncellendi','success');
        }else{
            Helper::alert('Bir Hata Meydana Geldi.','error');
        }
        return redirect()->back();
    }


    public function ticket(){
        return view('frontend.user.ticket');
    }

    public function favAdd($id){
        $NewSocial = new Social();
        $NewSocial->user_id = Auth::id();
        $NewSocial->type = 'fav';
        $NewSocial->event_id = $id;
        $NewSocial->save();
        Helper::alert('Favorileriniz Eklendi...');
        return redirect()->back();
    }

    public function favRemove($id){
        $Social = Social::where('user_id',Auth::id())->where('event_id',$id)->where('type','fav')->delete();
        Helper::alert('Favorilerden Kaldırıldı','warning');
        return redirect()->back();
    }

    public function eventGo($id){
        $NewSocial = new Social();
        $NewSocial->user_id = Auth::id();
        $NewSocial->type = 'gidecek';
        $NewSocial->event_id = $id;
        $NewSocial->save();
        Helper::alert('Harika Etkinliğe Katılıyorsun !!');
        return redirect()->back();
    }

    public function eventGoRemove($id){
        $Social = Social::where('user_id',Auth::id())->where('event_id',$id)->where('type','gidecek')->delete();
        Helper::alert('Etkinliğe Gitmiyorsunuz...','warning');
        return redirect()->back();
    }

    public function events(){
        $Events = Social::where('user_id',Auth::id())->where('type','gidecek')->get();
        return view('frontend.user.events',compact('Events'));
    }

    public function favs(){
        $Events = Social::where('user_id',Auth::id())->where('type','fav')->get();
        return view('frontend.user.favs',compact('Events'));
    }
}
