@extends('layouts.app')

@section('content')
    <h2>Edit Project</h2>

    {{--Display validation errors--}}
    @if ($errors->any())
        <div class="flash error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Edit project form--}}
    <form method="POST" action="/projects/{{ $project->pid }}">
    @csrf
    @method('PUT')

        <div>
            <label for="title">Project Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <div>
            <label for="short_description">Description:</label>
            <textarea name="short_description" id="short_description" required>{{ old('short_description', $project->short_description) }}</textarea>
        </div>

        <div>
            <label for="phase">Phase:</label>
            <select name="phase" id="phase" required>
                @foreach(['design', 'development', 'testing', 'deployment', 'complete'] as $phase)
                    <option value="{{ $phase }}" {{ $project->phase === $phase ? 'selected' : '' }}>
                        {{ ucfirst($phase) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{--Start date input--}}
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date) }}" required>
        </div>

        <button class="btn" type="submit">Update Project</button>
    </form>
@endsection