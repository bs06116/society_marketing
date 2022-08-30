@extends('layouts.app')
@section('content')
@if(session()->has('success_msg'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success_msg') }}
    </div>
@endif
<div class="main-padding">
    <h1 class="heading">Commission Calculation</h1>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Worth</h2>
                <h1 class="format-commas">{{\App\Models\Form::sum('total_price')}}</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Commission <span class="f-13">(8%)</span></h2>
                <h1 class="format-commas">{{(\App\Models\Form::sum('total_price')*8)/100}}</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Received Till Date</h2>
                <h1 class="format-commas">{{\App\Models\Commission::sum('total_commission')}}</h1>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form action="{{route('commission.add')}}" method="POST">
                    {{csrf_field()}}
                    <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <label for="" class="theme-label f-15">Received Commission</label>
                        <input type="number" name="total_commission" class="theme-input" placeholder="Received commission">
                    </div>
                    <div class="d-flex justify-content-end mt-1 ms-3">
                        <button class="theme-btn mt-1">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection