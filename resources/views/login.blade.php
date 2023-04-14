<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
        
</body>
</html>
