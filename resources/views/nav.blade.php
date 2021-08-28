<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand p-0" href="{{route('home')}}"><img class="img-logo" src="{{asset('png/fudyet-logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-underline" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link nav-link-underline" href="#">Contact</a>
                </li>-->
                <li class="nav-item ms-1">
                    <a class="nav-link  nav-neumorphism" aria-current="page" href="{{route('form')}}">Recommend me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>