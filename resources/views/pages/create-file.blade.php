@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <h1 class="heading text-center">Application Form</h1>
        <div class="row mb-2">
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">App No</label>
                <input type="number" class="theme-input" placeholder="App No">
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Reg No</label>
                <input type="number" class="theme-input" placeholder="Reg No">
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Form No</label>
                <input type="number" class="theme-input" placeholder="Form No">
            </div>
        </div>
        <h1 class="small-heading">Commercial/Residential</h1>
        <div class="table-card mb-3">
            <label for="" class="theme-label ms-0"><span class="f-15">Preferred choice</span> <span class="f-13 weight-400">(Subject to Availibility)</span></label>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Type</label>
                    <select name="" id="" class="theme-select">
                        <option value="" selected disabled>Select type</option>
                        <option value="">Residential</option>
                        <option value="">Commercial</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Plot size</label>
                    <select name="" id="" class="theme-select">
                        <option value="" selected disabled>Select size</option>
                        <option value="">5 marla</option>
                        <option value="">7 marla</option>
                        <option value="">10 marla</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Plot No</label>
                    <input type="number" class="theme-input" placeholder="Plot No">
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Street No</label>
                    <input type="number" class="theme-input" placeholder="Street No">
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Block/Sector</label>
                    <select name="" id="" class="theme-select">
                        <option value="" selected disabled>Select block/sector</option>
                        <option value="">Block 1</option>
                        <option value="">Block 2</option>
                        <option value="">Block 3</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Location/Type</label>
                    <input type="text" class="theme-input" placeholder="Location/Type">
                </div>
                <div class="col-12">
                    <label for="" class="theme-label me-3 pb-1">Preference of plot</label>
                    <div class="d-flex flex-wrap">
                        <label class="theme-checkbox me-3"><span class="d-inline-block">General</span>
                            <input type="checkbox" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Corner<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Boulevard<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Boulevard Corner<br><span class="weight-300">20% extra</span></span>
                            <input type="checkbox" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Park Facing<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" id="">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6">
                <label for="" class="theme-label">Payment</label>
                <select name="" id="" class="theme-select">
                    <option value="" selected disabled>Select</option>
                    <option value="">Installment</option>
                    <option value="">Lump Sum</option>
                </select>
            </div>
        </div>
        
        <h1 class="small-heading">For office use only</h1>
        <div class="table-card mb-3">
            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Extra Land</label>
                    <input type="text" class="theme-input" placeholder="Extra land">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Extra Land Cost</label>
                    <input type="number" class="theme-input" placeholder="Extra land cost">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Booking Data</label>
                    <input type="text" class="theme-input" placeholder="Booking data">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Total Price</label>
                    <input type="number" class="theme-input" placeholder="Total Price">
                </div>
            </div>
        </div>

        <h1 class="small-heading">Personal information</h1>
        <div class="row">
            <div class="col-sm-6">
                <label for="" class="theme-label">Name of Applicant</label>
                <input type="text" class="theme-input" placeholder="Name of applicant">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">S/O, D/0, W/O</label>
                <input type="text" class="theme-input" placeholder="S/O, D/0, W/O">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">CNIC No</label>
                <input type="number" class="theme-input" placeholder="CNIC No">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Passport No</label>
                <input type="number" class="theme-input" placeholder="Passport No">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Mailing Address</label>
                <input type="text" class="theme-input" placeholder="Mailing address">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Permanent Address</label>
                <input type="text" class="theme-input" placeholder="Permanent address">
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Phone No</label>
                <input type="number" class="theme-input" placeholder="Phone No">
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Mobile No</label>
                <input type="number" class="theme-input" placeholder="Mobile No">
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Email</label>
                <input type="email" class="theme-input" placeholder="Email">
            </div>
        </div>

        <h1 class="small-heading">Nominee information</h1>
        <div class="row">
            <div class="col-sm-6">
                <label for="" class="theme-label">Name of Applicant</label>
                <input type="text" class="theme-input" placeholder="Name of applicant">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">S/O, D/0, W/O</label>
                <input type="text" class="theme-input" placeholder="S/O, D/0, W/O">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">CNIC No</label>
                <input type="number" class="theme-input" placeholder="CNIC No">
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Passport No</label>
                <input type="number" class="theme-input" placeholder="Passport No">
            </div>
        </div>

        <div class="d-flex justify-content-end pt-3">
            <button class="theme-btn" style="width:150px;">Create File</button>
        </div>
    </div>
</div>
@endsection