<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Tech Dashboard</h1>
        
        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logouttech') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </div>
</body>
</html>