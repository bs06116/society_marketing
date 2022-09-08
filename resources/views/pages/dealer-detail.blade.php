@extends('layouts.app')
@section('content')

<div class="main-padding">
    <h1 class="heading">Dealer Detail</h1>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Plots</h2>
                <h1 class="format-commas">0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Commercial Plots</h2>
                <h1 class="format-commas">0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Residential Plots</h2>
                <h1 class="format-commas">0</h1>
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
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="residential-tab" role="tabpanel" aria-labelledby="commercial-tab" tabindex="0">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="dealer-card top-card">
                        <h6 class="mb-3">Block No.<span>1</span></h6>
                        <h6 class="mb-3">Plot No.<span>69</span></h1>
                        <h6 class="m-0">Plot Size.<span>30x40</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection