<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\course;
class CourseVideoController extends Controller
{


    public function create(Course $course)
    {
       return view('admin.courses.createvideo', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Course $course)
    {
        $rules = [
            'title' => 'required|min:10|max:100',
            'link' => 'required|url',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $video = Video::create($request->all());

        if($video) {
            return redirect()->back()->withStatus('Video successfully created.');
        }else {
            return redirect('/admin/courses/'.$course->id. '/videos/create')->withStatus('Something Wrong, Try again.');
        }
    }

}
