@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h1 class="heading">Plots</h1>
        {{-- <a href="{{ url('/booked-plots') }}">
            <button class="theme-btn">Booked Plots</button>
        </a> --}}
    </div>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total</h2>
                <h1 class="format-commas">{{\App\Models\Form::count()}}</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Purchased</h2>
                <h1 class="format-commas">{{\App\Models\Form::join('intallment', 'intallment.forms_id', '=', 'forms.id')->groupBy('intallment.id')->count()}}</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Available</h2>
                <h1 class="format-commas">{{\App\Models\Form::join('intallment', 'intallment.forms_id', '!=', 'forms.id')->groupBy('intallment.id')->count()}}</h1>
            </h1>
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
           @php
              $commercialPlot =  \App\Models\BlockPlot::where('block_category','commercial')->get();
           @endphp

            @foreach($commercialPlot as $cp)
            <h2 class="plot-size-heading">{{$cp->plot_size}}</h2>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Total</h2>
                        <h1 class="format-commas">{{$cp->total_plot}}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        @php
                        $totalPurchased =\App\Models\BlockPlot::join('forms', 'forms.plot_size', '=', 'block_plots.id')->where('forms.plot_size',$cp->id)->where('block_plots.block_category','commercial')->count();
                     @endphp
                        <h2>Purchased</h2>
                        <h1 class="format-commas">{{$totalPurchased}}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Available</h2>
                        <h1 class="format-commas">{{$cp->total_plot - $totalPurchased}}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @php
        $residentialPlot =  \App\Models\BlockPlot::where('block_category','residential')->get();
     @endphp
        <div class="tab-pane fade" id="residential-tab" role="tabpanel" aria-labelledby="residential-tab" tabindex="0">
            @foreach($residentialPlot as $rp)
            <h2 class="plot-size-heading">{{$rp->plot_size}}</h2>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Total</h2>
                        <h1 class="format-commas">{{$rp->total_plot}}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        @php
                        $totalPurchasedResdient =\App\Models\BlockPlot::join('forms', 'forms.plot_size', '=', 'block_plots.id')->where('forms.plot_size',$rp->id)->where('block_plots.block_category','residential')->count();
                     @endphp
                        <h2>Purchased</h2>
                        <h1 class="format-commas">{{$totalPurchasedResdient}}</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="top-card">
                        <h2>Available</h2>
                        <h1 class="format-commas">{{$rp->total_plot - $totalPurchasedResdient}}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection