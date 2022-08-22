@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <div class="row">
            <h1 class="heading">Search Plot</h1>
            <div class="col-lg-10 mb-3">
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
                {{-- <p class="error">This plot has already been sold.</p> --}}
                <label for="" class="pb-1 theme-label f-14 green-clr">This Plot is Available!</label>
                <label class="theme-checkbox me-3"><span class="d-inline-block f-14">Book Plot</span>
                    <input type="checkbox" id="">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection