<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <ul>
    @foreach ($flights as $flight)
      <li>
        {{ $flight->name }}
      </li>
    @endforeach
  </ul>
</body>
</html>