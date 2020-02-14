@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="votes">
                                        <strong>{{$question->votes}}</strong>
                                        {{\Illuminate\Support\Str::plural('vote', $question->votes) }}
                                    </div>

                                    <div class="answers {{$question->status}} {{$question->answers_cnt > 0 ? 'answered' : ''}}">
                                        <strong>{{$question->answers_cnt}}</strong>
                                        {{\Illuminate\Support\Str::plural('answer', $question->answers_cnt) }}
                                    </div>

                                    <div class="views">
                                        {{$question->views_cnt}}
                                        {{\Illuminate\Support\Str::plural('view', $question->views_cnt)}}
                                    </div>
                                </div>

                                <div class="media-body">
                                    <h3 class="mt-0">
                                        <a href="{{$question->url}}">
                                            {{$question->title}}
                                        </a>
                                    </h3>

                                    <p class="lead">
                                        Asked by
                                        <a href="#">
                                            {{$question->author->name}}
                                        </a>

                                        <small class="text-muted">
                                            {{$question->created_date}}
                                        </small>
                                    </p>
                                    {{\Illuminate\Support\Str::limit($question->body, 200)}}
                                </div>
                            </div>
                            <hr/>
                        @endforeach

                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
