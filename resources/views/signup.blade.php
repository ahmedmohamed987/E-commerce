<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="{{url('css/signup.css')}}">
</head>
<body>
    <div class="signup">
        <h2>Sign-up</h2>
        <form class="signup-form" action="{{route('save.customer')}}" method="POST">
            @csrf
          <p>
          <input type="text" name="username" placeholder="Enter your username" required>
          </p>
          <p>
          <input type="number" name="phone_number" pattern="[0]{1}[1]{1}[0-9]{9}" placeholder="Enter your phone number" required>
          </p>
          <p>
          <input type="email" name="email" placeholder="Enter your email" required>
          </p>
          <p>
          <input type="password" min="8" max="16" name="password" placeholder="Enter your password" required>
          </p>
          <p>
            <select name="location" required>
                <option value="Madeint Nasr" selected>Madeint Nasr</option>
                <option value="Helwan">Helwan</option>
            </select>
          </p>
          <p>
          <button type="submit" class="login-btn"> Sign up </button>
          </p>
        </form>
        <div class="login">
          <p>Have an account? <a href="{{route('login')}}">Login</a><p>
        </div>
      </div>

</body>
</html>
