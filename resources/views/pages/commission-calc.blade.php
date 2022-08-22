@extends('layouts.app')
@section('content')
<div class="main-padding">
    <h1 class="heading">Commission Calculation</h1>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Worth</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Commission <span class="f-13">(8%)</span></h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Received Till Date</h2>
                <h1>0</h1>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <label for="" class="theme-label f-15">Received Commission</label>
                        <input type="number" class="theme-input" placeholder="Received commission">
                    </div>
                    <div class="d-flex justify-content-end mt-1 ms-3">
                        <button class="theme-btn mt-1">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection