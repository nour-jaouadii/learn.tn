<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class TrackController extends Controller
{
    public function index($name){

    //     $q = $request->q;
      
        $track = Track::where('name', $name )->first();

        $courses = Track::where('name', $name )->first()->courses;

          //  dd($courses);
       return view('track_courses',compact('courses', 'track'));
   }     

}
