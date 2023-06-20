<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}">
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <form class="login-form" action="{{route('check.login')}}" method="POST">
            @csrf
            <p>
            <input type="email" name="email" placeholder="Enter your email" required>
            </p>
            <p>
            <input type="password" min="8" max="16" name="password" placeholder="Enter your password" required>
            </p>
            <p>
            <button type="submit" class="login-btn"><a href="{{route('home')}}"></a> Login </button>
            </p>
        </form>
        <div class="sign-up">
            <p>Don't have an account? <a href="{{route('signup')}}">Sign up</a><p>
        </div>
    </div>

</body>
</html>
