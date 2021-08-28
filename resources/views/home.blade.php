@extends('apphome')

@section('title', 'Fudyet')
@section('content')
    <div class="container">
                <div class="row" style="height: 100vh">
                    <div class="col-sm-6" style="padding-top: 15vh">
                        <h2 class="text-title-home">Find the right food for you at fudyet</h2>
                        <p class="text-shortdesc-home">you can find the right food according to your blood type and adjust the allergies you have</p>
                        <a href="{{'form'}}"><button class="btn-recommend-me-home">Recommend me <i class="bi bi-chevron-right"></i></button></a>
                    </div>
                    <div class="col-sm-6 text-center align-self-center">
                        <img style="width: 80%" src="{{ url('/svg/diet-animate.svg') }}" alt="">
                    </div>
                </div>


                <div class="row">
                    <h2 class="text-title-home text-center mb-5">Why should choose fudyet ?</h2>
                    <div class="col-sm-4 mb-3">
                        <div class="card card-home border-0" style="width: 18rem;">
                            <div class="card-body">
                                <h2 class="icon-home"><i class="fas fa-concierge-bell"></i></h2>
                                <h5 class="card-title title-card-home">400+ foods</h5>
                                <h6 class="card-subtitle card-desc-home mb-2">more than 400 recommended foods available at fudyet</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card card-home border-0" style="width: 18rem;">
                            <div class="card-body">
                                <h2 class="icon-home"><i class="fas fa-heartbeat"></i></h2>
                                <h5 class="card-title title-card-home">Highly Beneficial</h5>
                                <h6 class="card-subtitle card-desc-home mb-2">only recommend food that acts like medicine</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="card card-home border-0" style="width: 18rem;">
                            <div class="card-body">
                                <h2 class="icon-home"><i class="fas fa-user-md"></i></h2>
                                <h5 class="card-title title-card-home">Provided by the expert</h5>
                                <h6 class="card-subtitle card-desc-home mb-2">the data for these foods is provided by Dr. Robert Bischoff</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col">
                        <img style="width: 30%" src="{{ url('/svg/hamburger-animate.svg') }}" alt="">
                    </div>
                    <div class="col">
                        <h3>Junkfood</h3>
                    </div>
                </div>-->
    </div>
@endsection