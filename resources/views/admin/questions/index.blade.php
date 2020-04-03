@extends('layouts.app', ['title' => __('Question Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Questions') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Question') }}</a>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">

                                <tr>
                                     <th scope="col">{{ __('Questions') }}</th>
 
                                    <th scope="col">{{ __('The answer') }}</th>
                                    <th scope="col">{{ __('Score') }}</th>
                                    <th scope="col">{{ __('Quiz name') }}</th>

                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)

                                    <tr>
                                        <td title='{{$question->title}} ' > <a 
                                            >
                                            {{ \Str::limit($question->title,30) }} 
                                            </a>
                                        </td>

                                        <td>   <a >{{ $question->right_answer }}</a></td>
                                        <td>   <a >{{ $question->score }}</a></td>

                                        <td>
                                        <a  href="/admin/quizzes/{{$question->quiz->id}}">
                                            {{ \Str::limit($question->quiz->name,30) }}
                                        </a>
                                        </td>
                                        <td>{{ $question->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('questions.destroy', $question) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('questions.edit', $question) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                              
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach

                            </tbody>
  
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label=h "...">
                            {{ $questions->links() }}
                        </nav> 
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection