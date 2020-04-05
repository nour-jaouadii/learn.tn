<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Track;
use App\Course;

class HomeController extends Controller
{
	public function index() {

		$tracks = Track::with('courses')->orderBy('id', 'desc')->get();

		$famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

		$famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();
		 
		if(\Auth::check()) {
			 
			$user_id = auth()->user();

			$user_courses = $user_id->courses;

			$user_courses_ids = $user_id->courses()->pluck('id');

		    $user_tracks_ids =  $user_id->tracks()->pluck('id');

			$recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->
			whereNotIn('id', $user_courses_ids)->limit(4)->get();
		 
		   return view('home', compact('user_courses', 'tracks', 'famous_tracks', 'recommended_courses'));

		} else{

			return view('home', compact( 'tracks', 'famous_tracks'));

		}

		// dd($user_id);

	// 	$user_courses = User::findOrFail(1)->courses;
		 
	// 	$tracks = Track::with('courses')->orderBy('id', 'desc')->get();

	// 	// get famous tracks ids

	//    // [ keys => values]

	// 	$famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
		
	// 	//dd($famous_tracks_ids);
	// 	$famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();
	// 	//dd($famous_tracks);

	// 	$user_courses_ids = User::findOrFail(1)->courses()->pluck('id');

	// 	$user_tracks_ids = User::findOrFail(1)->tracks()->pluck('id');

	// 	$recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->whereNotIn('id', $user_courses_ids)->limit(4)->get();

	}
}
