@extends('layouts.app')

@section('content')
    {{--Project title--}}
    <h2>{{ $project->title }}</h2>

    <div class="details">
        {{--Start date in UK format--}}
        <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>

        {{--End date in UK format or Not yet completed is displayed--}}
        <p><strong>End Date:</strong>
            @if ($project->end_date)
                {{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}
            @else
                Not yet completed
            @endif
        </p>
  
        {{--Current project phase--}}
        <p><strong>Phase:</strong> {{ ucfirst($project->phase) }}</p>

        {{--Full description--}}
        <p><strong>Description:</strong> {{ $project->description }}</p>

        {{--Project owners email or Unassigned if no owner is linked--}}
        <p><strong>Owner Email:</strong> {{ $project->user?->email ?? 'Unassigned' }}</p>
    </div>

    {{--Edit link shown only to project owner--}}
    @if(Session::get('uid') == $project->uid)
        <p><a href="{{ url('/projects/' . $project->pid . '/edit') }}">Edit this project</a></p>
    @endif

    {{--Back link for user navigation--}}
    <p><a href="{{ url('/') }}">← Back to homepage</a></p>
@endsection