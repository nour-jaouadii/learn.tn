@extends('layouts.app', ['title' => __('Course Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Course')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Course Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('courses.store') }}" autocomplete="off"
                        enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="1" name="admin">
                            <h6 class="heading-small text-muted mb-4">{{ __('courses information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" 
                                    class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                    placeholder="{{ __('Title') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('link') }}</label>
                                    <input type="text" name="link" id="input-link" 
                                    class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" 
                                    placeholder="{{ __('link') }}" value="" required>
                                     
                                    
                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    
                                    <select name="status" class="form-control" required>

                                         <option value="0">FREE</option>
                                         <option value="1">PAID</option>

                                    </select>
                                    @if ($errors->has('Status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Status') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('track_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-track_id">
                                        {{ __('Track') }}</label>
                                    
                                    <select name="track_id" class="form-control" required>
                                
                                            <option value=" {{$track->id}} ">{{$track->name}} </option>

                                   </select>
                                    @if ($errors->has('track_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('track_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('image') }}</label>
                                    <input type="file" name="image" id="input-image" 
                                    class="form-control form-control-alternative
                                    {{ $errors->has('image') ? ' is-invalid' : '' }}" 
                                   required>
                               
                                    
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection