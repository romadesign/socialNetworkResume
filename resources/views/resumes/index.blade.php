@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach($resumes as $resume)
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title text-capitalize">
                        {{$resume->title}}
                    </h3>
                    <p>
                        {{$resume->content['basics']['sumary'] ?? 'No summary'}}
                    </p>
                    <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-primary mb-2">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Resume
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection