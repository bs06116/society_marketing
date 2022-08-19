@extends('layouts.app')
@section('content')
<div class="main-padding">
    <h1 class="heading">Financial Analysis</h1>
    <div class="row mb-4">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="top-card">
                <h2>Lorem ipsum</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="top-card">
                <h2>Lorem ipsum</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="top-card">
                <h2>Lorem ipsum</h2>
                <h1>0</h1>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="top-card">
                <h2>Lorem ipsum</h2>
                <h1>0</h1>
            </div>
        </div>
    </div>
    <div class="table-card">
        <div class="row">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="heading">Filter File</h1>
                <a href="{{ url('create-file') }}">
                    <button class="theme-btn">Add File</button>
                </a>
            </div>
            <div class="col-lg-10">
                <div class="d-flex align-items-center">
                    <div class="row flex-grow-1">
                        <div class="col-sm-6">
                            <label for="" class="theme-label">Block</label>
                            <select name="" id="" class="theme-select">
                                <option value="" disabled selected>Select Block</option>
                                <option value="">Block 1</option>
                                <option value="">Block 2</option>
                                <option value="">Block 3</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="theme-label">Plot Number</label>
                            <input type="text" class="theme-input" placeholder="Plot number">
                        </div>
                    </div>
                    <button class="theme-btn ms-3 mt-1" data-bs-toggle="modal" data-bs-target="#search-file-modal">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="search-file-modal" tabindex="-1" aria-labelledby="search-file-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close selection-cancel" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="file-info-main">
                    <div class="d-flex align-items-center mb-4 pb-2">
                        <img src="{{ asset('assets/images/avatar-2.png') }}" alt="" class="avatar">
                        <div>
                            <h6 class="name m-0">John Doe</h6>
                            <p class="email m-0">johndoe@gmail.com</p>
                        </div>
                    </div>

                    <div class="px-4">
                        <div class="d-flex info">
                            <h5 class="m-0">Block #</h5>
                            <p class="m-0">4</p>
                        </div>
                        <div class="d-flex info">
                            <h5 class="m-0">Plot #</h5>
                            <p class="m-0">145</p>
                        </div>
                        <div class="d-flex info">
                            <h5 class="m-0">Street #</h5>
                            <p class="m-0">17</p>
                        </div>
                        <div class="d-flex info">
                            <h5 class="m-0">Type</h5>
                            <p class="m-0">Commericial</p>
                        </div>
                        <div class="d-flex info">
                            <h5 class="m-0">-----</h5>
                            <p class="m-0">7 Marla</p>
                        </div>
                    </div>
                    <div class="flex-center selection-footer">
                        <button class="theme-btn me-2">File View</button>
                        <a href="{{ url('financial_view') }}">
                            <button class="theme-btn">Financial View</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection