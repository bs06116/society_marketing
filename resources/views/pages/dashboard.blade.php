@extends('layouts.app')
@section('content')
@if(session()->has('success_msg'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success_msg') }}
    </div>
@endif
<div class="main-padding">
    @canany(['view-financial'])

    <h1 class="heading">Financial Analysis</h1>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Worth of Plots</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/plot-db-icon.svg') }}" alt="">
                    <h1 class="format-commas">{{\App\Models\Form::sum('total_price')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Payment Received</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/total-payment.svg') }}" alt="">
                    <h1 class="format-commas">{{\App\Models\Form::sum('down_payment') + \App\Models\Installment::sum('amount')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Balance</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/balance.svg') }}" alt="">
                    <h1 class="format-commas">{{\App\Models\Form::sum('total_price') - \App\Models\Installment::sum('amount')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Down payment</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/down-payment.svg') }}" alt="">
                    <h1 class="format-commas">{{\App\Models\Form::sum('down_payment')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="top-card">
                <h2>Total Installments</h2>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/installments.svg') }}" alt="">
                    <h1 class="format-commas">{{\App\Models\Installment::sum('amount')}}</h1>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <div class="table-card">
        <div class="row">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="heading">Filter File</h1>
                @canany(['create-form'])

                <a href="{{ route('forms.create') }}">
                    <button class="theme-btn">Add File</button>
                </a>
                @endcan
            </div>
            <div class="col-lg-10 mb-3">
                <div class="d-flex align-items-center">
                    <div class="row flex-grow-1">
                        <div class="col-sm-6">
                            <label for="" class="theme-label">Block</label>
                            <select name="" id="block_id" class="theme-select">
                                <option value="" disabled selected>Select Block</option>
                                @php
                                $blocks = \App\Models\Block::get();
                                @endphp
                                @foreach($blocks as $block)
                                <option value="{{$block->id}}">{{$block->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="theme-label">Plot Number</label>
                            <input type="text" id="plot_number" class="theme-input" placeholder="Plot number">
                        </div>
                    </div>
                    <button class="theme-btn ms-3 mt-1" onclick="getApplication()" >Search
                        <span class="spinner-border spinner-border-sm spinner" style="display: none"></span>

                    </button>
                    {{-- data-bs-toggle="modal" data-bs-target="#search-file-modal" --}}
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
                <div class="file-info-main" id="append_data">
                    {{-- <div class="d-flex align-items-center mb-4 pb-2">
                        <img src="{{ asset('assets/images/avatar-2.png') }}" alt="" class="avatar">
                        <div>
                            <h6 class="name mb-1">John Doe</h6>
                            <p class="email m-0">00000-0000000-0</p>
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
function getApplication() {
          $(".spinner").show();
          var block_id = $("#block_id").val();
          var plot_number = $("#plot_number").val();
            $.ajax({
                url: "{{ route('appliction.get') }}",
                type: "POST",
                data: {
                    block_id : block_id,
                    plot_num : plot_number,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(".spinner").hide();
                    if (response.success == true) {
                       //console.info(response.data.id);
                       $("#append_data").html(response.data);
                       $("#search-file-modal").modal('show');
                    }else{
                        toastr.error(response.msg);
                    }
                },
            });
     }
</script>
@endpush