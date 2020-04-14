@extends('layouts.user_layout')

@section('content')

<div class="cards">
 @foreach ($tracks as $track)
     

  <div class="card">
    <div class="card__image-holder">
      <img href="/tracks/{{$track->name}}" class="card__image" src="https://source.unsplash.com/300x225/?mountain" 
      alt="wave" />
    </div>
    <div class="card-title">
      <a href="#" class="toggle-info btnX">
        <span class="left"></span>
        <span class="right"></span>
      </a>
      <h2 href="/tracks/{{$track->name}}" >
        Track   
         <small href="/tracks/{{$track->name}}" >{{ $track->name }}</small>
      </h2>
    </div>
    <div class="card-flap flap1">
      <div class="card-description">
          <br>
      
      </div>
      <div class="card-flap flap2" >
        <div class="card-actions" >
          <a  href="/tracks/{{$track->name}}" class="btnX">
            See courses</a>
        </div>
      </div>
    </div>
  </div>

 
  @endforeach

  <div style="background-color: white; border-top: 1px solid white;" class="card-footer  py-4 text-left">
    <nav  style="float: left;" class="d-flex justify-content-end" aria-label="...">
        {{$tracks->links() }} 
    </nav> 
</div>


</div>

@endsection
