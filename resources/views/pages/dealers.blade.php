@extends('layouts.app')
@section('content')

<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Dealers</h1>
        <div class="table-responsive">
            <table class="theme-table">
                <thead>
                    <tr>
                        <th>Dealers name</th>
                        <th>----</th>
                        <th>----</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>----</td>
                        <td>----</td>
                        <td>----</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn-none me-1">
                                    <img src="{{ asset('assets/images/svg/edit.svg') }}" alt="" width="15">
                                </button>
                                <button class="btn-none">
                                    <img src="{{ asset('assets/images/svg/delete.svg') }}" alt="" width="15">
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection