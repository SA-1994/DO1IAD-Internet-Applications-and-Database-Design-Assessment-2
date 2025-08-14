@extends('layouts.app')

@section('content')
    <h2>Create a New Project</h2>

    {{--Show validation errors--}}
    @if ($errors->any())
        <div class="flash error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Project creation form--}}
    <form class="register-form" method="POST" action="{{ url('/projects/create') }}">
        @csrf

        {{--Title input--}}
        <div>
            <label>Project Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        {{--Short description input--}}
        <div>
            <label>Short Description:</label>
            <input type="text" name="short_description" value="{{ old('short_description') }}" required>
        </div>

        {{--Start date input--}}
        <div>
            <label>Start Date:</label>
            <input type="date" name="start_date" value="{{ old('start_date') }}" required>
        </div>

        {{--End date input--}}
        <div>
            <label>End Date:</label>
            <input type="date" name="end_date" value="{{ old('end_date') }}">
        </div>

        {{--Phase dropdown--}}
        <div>
            <label>Phase:</label>
            <select name="phase" required>
                <option value="">Select phase</option>
                <option value="design" {{ old('phase') == 'design' ? 'selected' : '' }}>Design</option>
                <option value="development" {{ old('phase') == 'development' ? 'selected' : '' }}>Development</option>
                <option value="testing" {{ old('phase') == 'testing' ? 'selected' : '' }}>Testing</option>
                <option value="deployment" {{ old('phase') == 'deployment' ? 'selected' : '' }}>Deployment</option>
                <option value="complete" {{ old('phase') == 'complete' ? 'selected' : '' }}>Complete</option>
            </select>
        </div>

        {{--Submit button--}}
        <button class="btn" type="submit">Create Project</button>
    </form>
@endsection