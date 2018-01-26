<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->body }}</li>
        @endforeach
    </ul>
</body>
</html>