<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">

    @if(Session::has('success'))
    <div class="alert alert-success">{{ session::get('success') }}</div>
    @endif

    @if(Session::has('fail'))
    <div class="alert alert-danger">{{ session::get('fail') }}</div>
    @endif

  <h2>Registration form</h2>
  <form action="register-user" method="post">
      @csrf
    <div class="form-group">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="name"  value="{{ old('name') }}">
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
      </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
      <span class="text-danger">
        @error('email')
            {{$message}}
        @enderror
    </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"  value="{{ old('password') }}">
      <span class="text-danger">
        @error('password')
            {{$message}}
        @enderror
    </span>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
  <a href="login">Allready registration! login here.</a>
</div>

</body>
</html>
