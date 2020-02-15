@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card question-block">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>{{ $question->title }}</h2>

                            @include('questions._action_buttons', compact('question'))
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="media">
                            <div class="media-body">
                                {{ $question->body_html }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
