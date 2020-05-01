{{--

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

   --}}

        <div style="margin-top: 95px; margin-bottom: 100px;"  class="container bootstrap snippets">
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4">

                        <ul class="list-unstyled">
                            <li class="text-center">
                                <img style="border-radius:50%;" data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="//bootdey.com/img/Content/avatar/avatar1.png" alt="John Doe">
                            </li>
                            <li class="text-center">
                                <h4 class="text-capitalize">{{ $course ->instructor->name  }}</h4>

                                <p class="text-muted text-capitalize">
                                    <span class="glyphicon glyphicon-hd-video"></span>
                                   <span>{{ $count_course_instructor   }}
                                  {{--
                                     {{ (Course::where('instructor_id',  $course->instructor->id )->get()) }}

                                 --}}
                                 </span>  Courses
                                </p>
                                <p class="text-muted text-capitalize">
                                    <span class="glyphicon glyphicon-user"></span>


                              {{$nbre_student }} Students
                                </p>
                            </li>
                            <li>
                                <a href="" class="btn btn-primary text-center btn-block">Profile</a>
                            </li>
                            <li><br></li>
                            <li>
                                <div class="btn-group-vertical btn-block">

                                </div>
                            </li>
                        </ul>
                  </div>

                <div class="col-lg-9 col-md-9 col-sm-8">

                        <div class="instructor--instructor__title--2-Bub">
                            <a style=" color: black;   font-weight: bolder;;
                            ;"   href="">
                                The Net Ninja (Shaun Pelling)
                            </a>
                        </div>
                        <p><strong>A Little About Me... </strong>  </p>
                        <p>Hey gang, my name's Shaun and since a young age I've had an obsession for nearly anything tech-related. I've been coding since about the age of 15 (half of my life, now...phew!) and work as a full-stack web developer and online instructor.</p><p>I also run a well-known development tutorial YouTube channel called <strong>The Net Ninja </strong>with nearly <strong>500,000</strong> subscribers. So feel free to browse some of my latest free tutorials on there if you want to check out my teaching style :).</p><p>My specialities mainly gravitate around one central language (and my first love) - JavaScript. I've been programming with it for around 12 years and - as with any long-term relationship - have had the pleasure of seeing it's ugly side as well as it's beautiful side. So I know the pitfalls to avoid when using it, and pass these on when appropriate in my tutorials.</p><p>As well as teaching, I've also helped to create many very popular, UK-based eCommerce websites, as well as a large amount of smaller, independent websites as well.</p><p>Other languages &amp; technologies I use and teach are - Node.js, Vue, React, Python, Ruby, PHP, HTML &amp; CSS.'
                        <br></p>


                    <div class="instructor--instructor__view-more-wrapper--w6L78">
                        <button type="button" class="instructor--view-more-wrapper__button--2egB6 btn btn-link">+ See more</button>
                    </div>


                </div>

            </div> {{-- end row --}}
        </div> {{-- end container --}}



         {{-- rania --}}



         {{-- end rania --}}

{{--  courses for instructor --}}
    <div class="container">

        <div class="all-courses">

            <h4>My Courses ( {{$course_instructor->count() }} )</h4>

            <div class="row">
            @foreach($course_instructor as $course)

                <div class="col-sm-3">
                    <div class="course">
                        @if($course->photo)
                        <a href="/courses/{{$course->slug}}"><img src="/images/{{ $course->photo->filename }}"></a>
                        @else
                        <a href="/courses/{{$course->slug}}"><img src="/images/default.jpg"></a>
                        @endif
                        <h6><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 50)}}</a></h6>
                        <span style="margin-left: 10px; font-weight: 500;" class="{{ $course->status == '0' ? 'text-success' : 'text-danger' }}">{{ $course->status == '0' ? 'FREE' : 'PAID' }}</span>
                        <span style="margin-left: 50%">{{ count($course->users) }} users</span>
                    </div>
                </div>


            @endforeach
            </div>
        </div>
