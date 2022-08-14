@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Create File</h1>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Name</label>
                <input type="text" class="theme-input" placeholder="Name">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Number</label>
                <input type="number" class="theme-input" placeholder="Number">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">CNIC</label>
                <input type="number" class="theme-input" placeholder="CNIC">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Email</label>
                <input type="email" class="theme-input" placeholder="Email">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Address</label>
                <input type="text" class="theme-input" placeholder="Address">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Block Number</label>
                <select name="" id="" class="theme-select">
                    <option selected disabled>Select Block</option>
                </select>
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Plot Number</label>
                <input type="text" class="theme-input" placeholder="Plot number">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Total Price</label>
                <input type="number" class="theme-input" placeholder="Total price">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Down Payment</label>
                <input type="number" class="theme-input" placeholder="Down Payment">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Installment Payment</label>
                <input type="number" class="theme-input" placeholder="Installment payment">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Installment Plan</label>
                <select name="" id="" class="theme-select">
                    <option selected disabled>Select Installment</option>
                </select>
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Reference Dealer</label>
                <input type="number" class="theme-input" placeholder="Reference dealer">
            </div>
            <div class="col-xl-4 col-md-6">
                <label for="" class="theme-label">Upload Image</label>
                <input class="theme-input" type="file" id="formFile" accept="image/*">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="theme-btn">Create File</button>
        </div>
    </div>
</div>
@endsection