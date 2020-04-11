<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quiz;

class QuizQuestionController extends Controller
{
 
    public function create(Quiz $quiz)
    {
        return view('admin.quizzes.createquestion', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:20|max:1000',
            'answers' => 'required|min:10|max:1000',
            'right_answer' => 'required|min:3|max:100',
            'score' => 'required|integer|in:5,10,15,20,25,30',
             'type' => 'required|in:text,checkbox',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if(Question::create($request->all())) {
            return redirect('/admin/questions')->withStatus('Question successfully created.');
        }else {
            return redirect('/admin/questions/create')->withStatus('Something Wrong, Try again.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
