<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: #FFFCF7"> <!-- rgb(247, 247, 247)   #d9ca62-->

    <nav class="navbar navbar-expand-lg navbar-light bg-transparrent">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <div class="container">
            <div class="row" style="height: 100vh">
                <div class="col-sm-6" style="padding-top: 15vh">
                    <h2>Find Your food recommendation in fudyet.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia exercitationem eveniet dignissimos vel nemo, quaerat, 
                        sapiente porro quod expedita odit necessitatibus.</p>
                    <button>Recommend me</button>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <img style="width: 80%" src="{{ url('/svg/diet-animate.svg') }}" alt="">
                </div>
            </div>

             <div class="row">
                <div class="col">
                     <img style="width: 30%" src="{{ url('/svg/hamburger-animate.svg') }}" alt="">
                </div>
                <div class="col">
                    <h3>Junkfood</h3>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>