@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card question-block">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h2>{{ $question->title }}</h2>

                                @include('questions._action_buttons', compact('question'))
                            </div>
                        </div>

                        <hr/>

                        <div class="media">
                            <div class="d-flex flex-column vote-controls mr-5">
                                @include('questions._vote_controls', [
                                    'voteUpTitle'   => 'This question is useful',
                                    'voteDownTitle' => 'This question is not useful',
                                ])

                                <a title="Click to mark as favorite (Click again to undo)"
                                   class="favorite favorited mt-2">
                                    <i class="fas fa-star fa-2x "></i>
                                    <span class="favorites-count">4</span>
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media">
                                    <div class="media-body">
                                        {!! $question->body_html !!}

                                        <div class="float-right">
                                            <span class="text-muted small">Asked {{$question->created_date}}</span>
                                            <div class="media mt-1" style="min-width: 150px">
                                                <a href="{{$question->author->url}}" class="pr-2">
                                                    <img src="{{$question->author->avatar}}">
                                                </a>

                                                <div class="media-body mt-2 small">
                                                    <a href="{{$question->author->url}}">{{$question->author->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-muted">
                                {{
                                    $question->answers_cnt . ' ' .
                                    \Illuminate\Support\Str::plural('Answer', $question->answers_cnt)
                                }}
                            </h2>

                            <hr/>

                            @foreach($question->answers as $answer)
                                <div class="media">
                                    <div class="d-flex flex-column vote-controls mr-5">
                                        @include('questions._vote_controls', [
                                            'voteUpTitle'   => 'This answer is useful',
                                            'voteDownTitle' => 'This answer is not useful',
                                        ])

                                        <a title="Click to mark as best answer (Click again to undo)"
                                           class="vote-accept mt-2">
                                            <i class="fas fa-check fa-2x "></i>
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        {!! $answer->body !!}

                                        <div class="float-right">
                                            <span class="text-muted small">Answered {{$answer->created_date}}</span>
                                            <div class="media mt-1" style="min-width: 150px">
                                                <a href="{{$answer->user->url}}" class="pr-2">
                                                    <img src="{{$answer->user->avatar}}">
                                                </a>

                                                <div class="media-body mt-2 small">
                                                    <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
