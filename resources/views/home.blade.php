@extends('apphome')

@section('title', 'Fudyet')
@section('content')
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
@endsection