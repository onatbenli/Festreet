<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\City;
use App\Model\Place;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function country($id){
        $Cities = City::where('country_id',$id)->get();
        return $Cities;
    }

    public function subCategory($id){
        $SubCategories = Category::where('sub_category',$id)->get();
        return $SubCategories;
    }

    public function place($id){
        $Places = Place::where('city',$id)->get();
        return $Places;
    }
}
