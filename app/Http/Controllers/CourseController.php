<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug) {


    	$course = Course::where('slug', $slug)->first();
    	return view('course', compact('course'));
    }

    public function enroll($slug) {


        $course = Course::where('slug', $slug)->first();
        $user  = auth()->user();
      // dd( $user->courses()->where('slug',$slug)->get());
         
       // verifier si l'utilisateur auth a cette course where('slug',$slug)

        //if( count($user->courses()->where('slug',$slug)->get())>0){  
        //    return redirect('courses/'.$slug, )->
        //    withStatus('you have already enrolled '.$course->title) ;
        //  }else{
            $user->courses()->attach([$course->id]);
  
            return redirect('courses/'.$slug, )->
            withStatus('you have enrolled in '.$course->title);

        //  }
   }

  
}