@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-md-3">
                 <div class="card card-dashboard-wrapper" style="width: 100%">
                    <div class="card-body card-dashboard">
                        <h3 class="card-title">Foods</h3>
                        <h1>{{ $foodCount }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                 <div class="card card-dashboard-wrapper" style="width: 100%">
                    <div class="card-body card-dashboard">
                        <h3 class="card-title">Blood Type</h3>
                        <h1>{{ $bloodTypeCount }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                 <div class="card card-dashboard-wrapper" style="width: 100%">
                    <div class="card-body card-dashboard">
                        <h3 class="card-title">Allergy Name</h3>
                        <h1>{{ $allergyNameCount }}</h1>
                    </div>
                </div>
            </div>

             <div class="col-md-3">
                 <div class="card card-dashboard-wrapper" style="width: 100%">
                    <div class="card-body card-dashboard">
                        <h3 class="card-title">Rules</h3>
                        <h1>{{ $foodFactCount }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection