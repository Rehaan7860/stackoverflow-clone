@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-body">
                       <div class="card-title">
                           <div class="d-flex align-items-center justify-content-between">
                               <h2 class="fw-bolder my-auto"> {{ $question->title }}</h2>
                               <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all questions</a>
                           </div>
                       </div>

                       <hr>

                       <div class="media">
                           <div class="row w-auto">
                           <div class="col-md-auto ms-0">
                               <div class="d-flex flex-column w-auto align-items-center vote-controls">
                               <a href="" title="This question is useful" class="vote-up">
                                   <i class="fas fa-caret-up fa-3x text-black"></i>
                               </a>
                               <span class="votes-count">1230</span>
                               <a href="" title="This question is not useful" class="vote-down off">
                                   <i class="fas fa-caret-down fa-3x"></i>
                               </a>
                               <a href="" title="Click to mark as favorite question (Click again to undo)" class="favorite text-decoration-none mt-3 favorited">
                                   <i class="fas fa-star fa-2x"></i>
                                   <span class="favorites-count d-block text-center">123</span>
                               </a>
                               </div>
                           </div>

                           <div class="media-body text-wrap col-md mt-2">
                               {{ $question->body }}
                           </div>
                               <div class="text-end">
                                    <span class="text-muted">
                                        Question asked {{ $question->created_date }}
                                    </span>
                                   <div class="media d-flex justify-content-end mt-3 align-items-center">
                                       <a href="{{ $question->user->url }}" class="pe-2">
                                           <img src="{{ $question->user->avatar }}" alt="">
                                       </a>
                                       <div class="media-body">
                                           By
                                           <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                       </div>
                                   </div>

                               </div>
                           </div>

                       </div>
                   </div>
                </div>
            </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2> {{ $question->answers_count }} {{ Str::title(Str::plural('Answer', $question->answers_count)) }} </h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="row w-auto">
                                <div class="col-md-auto ms-0">
                                    <div class="d-flex flex-column w-auto align-items-center vote-controls">
                                        <a href="" title="This answer is useful" class="vote-up">
                                            <i class="fas fa-caret-up fa-3x text-black"></i>
                                        </a>
                                        <span class="votes-count">1230</span>
                                        <a href="" title="This answer is not useful" class="vote-down off">
                                            <i class="fas fa-caret-down fa-3x"></i>
                                        </a>
                                        <a href="" title="Mark this answer as best answer" class="vote-accepted text-decoration-none mt-3">
                                            <i class="fas fa-check fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            <div class="media-body col-md mt-2">
                                {{ $answer->body }}
                            </div>
                                <div class="text-end mt-3">
                                    <span class="text-muted">
                                        Answered {{ $answer->created_date }}
                                    </span>
                                        <div class="media d-flex justify-content-end mt-3 align-items-center">
                                            <a href="{{ $answer->user->url }}" class="pe-2">
                                                <img src="{{ $answer->user->avatar }}" alt="">
                                            </a>
                                                <div class="media-body">
                                                    <a href="{{ $answer->user->url }}"> {{ $answer->user->name }}</a>
                                                </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
