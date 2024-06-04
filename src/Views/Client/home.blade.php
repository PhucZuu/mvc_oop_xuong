<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="container">
        <h1>WELCOME {{ $name }} TO MY WEBSITE</h1>

        <nav>
            @if (isset($_SESSION['user']))
            <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
            @else
            <a class="btn btn-primary" href="{{ url('login') }}">Login</a>
            @endif
            
        </nav>
    </div>
    
    
</body>
</html>