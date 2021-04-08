<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login </title>
</head>
<body>
    <div class="container">
        <div class="col-lg-6 m-auto">
            <div class="bg-light mt-5">
                <h2 class="text-center bg-info text-dark py-2">Login</h2>
               
                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                <form action="{{ route('auth.check_user') }}" method="POST">
                    @csrf
                    <div class = "form-group">
                        <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" >
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class = "form-group">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class = "form-group">
                        <button class="registerbtn btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
                <div class="container signin">
                    <p>To create new account  <a href="{{ route('auth.register') }}">Sign in</a>.</p>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>