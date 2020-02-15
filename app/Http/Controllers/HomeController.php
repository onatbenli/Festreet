<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Model\Category;
use App\Model\Currency;
use App\Model\Event;
use App\Model\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $Events = Event::paginate(20);
        return view('frontend.index',compact('Events'));
    }

    public function searchPlan(Request $request){
        $Category = Category::where('id',$request->get('tag'))->first();
        return view('frontend.event.category',compact('Category'));
    }

    public function search(Request $request){
        $Events = Event::where('title','LIKE',"%{$request->get('search')}%")->get();
        $SearchText = $request->get('search');
        return view('frontend.event.search',compact('Events','SearchText'));
    }

    public function dummy(){
        dd(json_encode(["14.01.2020 15:00","14.01.2020 18:00"]));
    }
}
