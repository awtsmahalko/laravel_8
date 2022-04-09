<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-6 col-md-offset-3">
                <h4>User Registration</h4>
                <form action="{{ route('auth.create') }}" method="POST">
                    @csrf
                    <div class="results">
                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success')}}
                            </div>
                        @endif
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        <span class="text-danger">@error('name') {{ $message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username') {{ $message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="text-danger">@error('password') {{ $message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                    </div>
                    <br>
                    <a href="login">Already Register? Login Here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>