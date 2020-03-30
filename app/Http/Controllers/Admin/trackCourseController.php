<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Track;
class trackCourseController extends Controller
{
    public function create(Track $track)
    {
       return view('admin.tracks.createcourse', compact('track'));
    }




}
