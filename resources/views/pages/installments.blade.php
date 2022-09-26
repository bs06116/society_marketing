@extends('layouts.app')
@section('content')

<div class="main-padding">

    <h1 class="heading">Installments</h1>
    
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Installments Received</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/installments.svg') }}" alt="">
                    <h1 class="format-commas">0000</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Installments Pending</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/installments.svg') }}" alt="">
                    <h1 class="format-commas">0000</h1>
                </div>
            </div>
        </div>
    </div>


    <ul class="nav nav-pills theme-tab pt-4" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#received-tab" type="button" role="tab" aria-controls="received-tab" aria-selected="true">Received</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pending-tab" type="button" role="tab" aria-controls="pending-tab" aria-selected="false">Pending</button>
        </li>
    </ul>
    
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="received-tab" role="tabpanel" aria-labelledby="received-tab" tabindex="0">
            <div class="table-card">
                <table class="theme-table">
                    <thead>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Plot no</th>
                        <th>Block no</th>
                        <th>Number of Installments</th>
                        <th>Paid Installments</th>
                        <th>Remaining Installments</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td class="red-clr">----</td>
                            <td class="d-flex">
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/edit.svg") }}" alt="" width="15"></button>
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/view.svg") }}" alt="" width="15"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td class="red-clr">----</td>
                            <td class="d-flex">
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/edit.svg") }}" alt="" width="15"></button>
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/view.svg") }}" alt="" width="15"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pending-tab" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">
            <div class="table-card">
                <table class="theme-table">
                    <thead>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Plot no</th>
                        <th>Block no</th>
                        <th>Number of Installments</th>
                        <th>Paid Installments</th>
                        <th>Remaining Installments</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td class="red-clr">----</td>
                            <td class="d-flex">
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/edit.svg") }}" alt="" width="15"></button>
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/view.svg") }}" alt="" width="15"></button>
                            </td>
                        </tr>
                        <tr>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td>----</td>
                            <td class="red-clr">----</td>
                            <td class="d-flex">
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/edit.svg") }}" alt="" width="15"></button>
                                <button class="btn-none"><img src="{{ asset("assets/images/svg/view.svg") }}" alt="" width="15"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection