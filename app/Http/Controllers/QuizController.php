<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Quiz;
class QuizController extends Controller
{
    public function index($slug, $name) {

        $course = Course::where('slug', $slug)->first();
        $quiz = $course->quizzes()->where('name', $name)->first();

       // dd('$course');

        return view('quiz', compact('quiz'));
    }

    public function submit($slug, $name,Request $request) {

        $quiz = Quiz::where('name', $name)->first();

        $questions = $quiz->questions;

        $quiz_score = 0;
        
       $questions_ids = [] ; // id  du question 
       $questions_right_answers = [] ; // 
        
       foreach ($questions as $question) {
           
        $questions_ids[] = $question->id;
        $questions_right_answers[] = $question->right_answer;
        $quiz_score += $question->score;
       }
       
      for($i = 0; $i < count($questions_ids); $i++ ){
         
        $your_answer = trim($request['answer'. $questions_ids[$i]] )  ;   
        $the_right_answer = trim($questions_right_answers[$i]) ;
        
        if($your_answer != $the_right_answer) {
            return redirect()->back()->withStatus("Your answer ( '".  $your_answer ."' ) is not correct.");
        }
      } 
        
     // many to many relation
    
        // attach user with the quiz

        $user = auth()->user();

        $user->quizzes()->attach([$quiz->id]);

        // increment user's score

        $user->score += $quiz_score;

     if ($user->save()) {
    
      return redirect('/courses/'. $quiz->course->slug )->withStatus(' well done ,  You have solved <strong>( '. $quiz->name .' )
                    </strong> Quiz and earned <strong>(' . $quiz_score .')</strong> points ' );
        }

    }
    

}

