@extends('layouts.app')
@section('content')
<div class="main-padding">
    <h1 class="heading">Plots</h1>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Purchased</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Available</h2>
                <h1>0</h1>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills theme-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#commercial-tab" type="button" role="tab" aria-controls="commercial-tab" aria-selected="true">Commercial</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#residential-tab" type="button" role="tab" aria-controls="residential-tab" aria-selected="false">Residential</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="commercial-tab" role="tabpanel" aria-labelledby="commercial-tab" tabindex="0">
            <h2 class="plot-size-heading">30x40</h2>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Total</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Purchased</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Available</h2>
                        <h1>0</h1>
                    </div>
                </div>
            </div>            
            <h2 class="plot-size-heading">25x40</h2>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Total</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Purchased</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Available</h2>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="residential-tab" role="tabpanel" aria-labelledby="residential-tab" tabindex="0">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Total</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Purchased</h2>
                        <h1>0</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Available</h2>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection