@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                      <h2> </h2>
                    </div>
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $track->name }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href='/admin/tracks/ {{$track->id}}/courses/create' 
                                 class="btn btn-sm btn-primary">
                                    {{ __('New Course') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                      
                    

                        
                @if (count($track->courses))
                    <div class="row">

                                
                        @foreach ($track->courses  as $course)
                            <div class="col-sm-3"> 

                                <div class="card" style="width: 18rem;">
                                    @if ($course->photo)
                                        <img height ='150' width="150" class="card-img-top" 
                                        src="/images/{{ $course->photo->filename }}" alt="Card image cap">
                                    @else
                                            
                                        <img height ='150' width="150" class="card-img-top" 
                                        src="/images/default.jpg" alt="Card image cap">
                                    @endif
                                        <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit( $course->title,100)}}</h5>

                                  <form method="POST" action=" {{ route('courses.destroy', $course->id)}} "> 
                                    
                                    @csrf
                                    @method('DELETE')

                                    <a href="  {{ route('courses.edit',$course->id) }}  " class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{ route('courses.show',$course) }} " class="btn btn-primary btn-sm">show</a>
                                    <input type="submit" class=" btn btn-danger btn-sm" value="Delete" name="delete course">
                                   

                                  </form>

                                    </div>
                                </div>
                            </div>

                         @endforeach

                            

                </div>

                @else

                   <p class="lead text-center"> No Courses Found<p class ="lead" >
                @endif
                
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection