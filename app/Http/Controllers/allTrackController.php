<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Track;
use App\Course;

class allTrackController extends Controller
{
        public function index() {
          
            $tracks = Track::orderBy('id', 'desc')->paginate(9);

            return view('allTrack',compact('tracks'));
            
        }
    }
    
