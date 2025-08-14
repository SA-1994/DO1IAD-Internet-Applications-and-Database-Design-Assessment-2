@extends('layouts.app')

@section('content')
    {{--Page heading--}}
    <h2>All Projects</h2>

    {{--Search bar--}}
    <form class="homepage-form" method="GET" action="{{ url('/') }}">
    <input type="text" name="search" placeholder="Search by title or phase" value="{{ request('search') }}">
    <input type="date" name="start_date" value="{{ request('start_date') }}">
    <input type="date" name="end_date" value="{{ request('end_date') }}">
    <button class="btn" type="submit">Search</button>
    </form>



    {{--Loop through all projects--}}
@if ($projects->count())
    @foreach ($projects as $project)
        <div class="project">
            <h3>{{ $project->title }}</h3>
            {{--Show start date in UK format--}}
            <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>
            {{--Show current phase as status--}}
            <p><strong>Status:</strong> {{ ucfirst($project->phase) }}</p>
            <p>{{ $project->short_description }}</p>
            {{--Link to full project details using pid for routing--}}
            <a class="btn" href="{{ url('/projects/' . $project->pid) }}">View Details</a>
        </div>
    @endforeach
@else
    {{--In the event of no matching results below message is displayed--}}
    <p style="font-size: 1.5rem; color: #555; text-align: center; margin-top: 2rem;">
        No results found{{ request('search') ? ' for "' . request('search') . '"' : '' }}.
    </p>
@endif
@endsection