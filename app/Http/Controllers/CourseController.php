<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug) {


        $course = Course::where('slug', $slug)->first();

         // dd($course->users  );

        $instruct_id = $course->instructor->id ;
        // dd($instruct_id );  //36

       $course_instructor =  Course::where('instructor_id', $instruct_id )->get() ; // array = 6 course;
       $count_course_instructor =  $course_instructor->count(); // 6 integer
     // $count_course_instructor =  Course::where('instructor_id', $instruct_id )->count(); // 6 integer


          $z = $course_instructor->count() ; // 6cours

              // dd($z);
          $count= [];
          foreach ($course_instructor as $cours ){
                // dd( $cours);
                $count[] = $cours->users->count();

             }
             $nbre_student = array_sum($count);






    	return view('course', compact('course', 'course_instructor', 'count_course_instructor','nbre_student'));
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

          // attach user to course
            $user->courses()->attach([$course->id]);

            $track = $course->track;

          // attach user to track
            $user->tracks()->attach([$track->id]);

            return redirect('courses/'.$slug, )->
            withStatus('you have enrolled in '.$course->title);

        //  }
   }
//    public function profile($slug) {

//     $course = Course::where('slug', $slug)->first();

//    //

// }



}
