
 {{-- TrachController --}}
{{-- 
	after search 
	or 
	allTrack 
	--}}
@extends('layouts.user_layout')

@section('content')
<span>
	<h1 class="nour" style="  " >
		{{$track->name}} courses
	</h1>
</span>
		<div class="nour">

			<h3 style="">
				Courses to get you started
			</h3>

		</div>
	<div class="container">
		
		<div class="search-courses">

			<div class="row">
				<div class="col-sm-8">
					@foreach($courses as $course)
						<div class="course">
							<div class="row">
								<div class="col-sm-4">
									<div class="course-image">
										@if($course->photo)
										<a href="/courses/{{ $course->slug }}">
											<img src="/images/{{ $course->photo->filename }}">
										</a>
										@else
                                        <a href="/courses/{{ $course->slug }}">
                                            <img src="/images/default.jpg"></a>
										@endif
									</div>
								</div>
								
								<div class="col-sm-8">
									<div class="course-info">

										<h6><a href="/courses/{{ $course->slug }}">{{ \Str::limit($course->title, 30) }}</a></h6>
										<span id="nour">{{ \Str::limit($course->description, 100) }}</p></span><p>
										<h6 class="track-row">Track: 
											<a href="">{{$course->track->name}}</a>
											<span style="float: right; margin-right: 10px;">
												@if($course->status == 0)
												<span class="free-badge">FREE</span>
												@else
												<span class="paid-badge">PAID</span>
												@endif
												<span>{{count($course->users)}}</span>
												<span> users enrolled</span>
											</span>
										</h6>

									</div>
								</div>

							</div>
							

						</div>
						
					@endforeach
				</div>

				<div class="col-sm">
					


				</div>

			</div>
		</div>


	</div>

@endsection