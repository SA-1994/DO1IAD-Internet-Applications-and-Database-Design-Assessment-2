<!DOCTYPE html>
<html>
<head>
    <title>Project Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            color: #333;
        }
        .project {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .project a {
            color: #007bff;
            text-decoration: none;
        }
        .project a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>All Projects</h1>

    @foreach ($projects as $project)
        <div class="project">
            <h2>{{ $project->title }}</h2>
            <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
            <p>{{ $project->short_description }}</p>
            <a href="/projects/{{ $project->id }}">View Details</a>
        </div>
    @endforeach
</body>
</html>