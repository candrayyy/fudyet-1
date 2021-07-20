<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: #e7e8ed">
      <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
       
         <form class="p-4" action="{{route('admin.login')}}" method="POST">
           @csrf
             <h2 class="text-center">Login here</h2>
             <div class="fields">
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <div class="input-email"> <input type="email" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required></div>
                 </div>
                 @error('email')
                    <span class="invalid-feedback">{{$message}}</span>
                 @enderror
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-password"><input type="password" class="form-control shadow-none" id="exampleInputPassword1" name="password" required></div>
                    <input type="checkbox" class="mt-2 me-1" onclick="showHide()">Show password
                </div>
                 @error('password')
                    <span class="invalid-feedback">{{$message}}</span>
                 @enderror
             </div>
           <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input shadow-none" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>-->
            <div class="text-center">
                 <button type="submit" class="btn">Login</button>
            </div>
        </form>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{ asset('/js/login.js') }}"> </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>