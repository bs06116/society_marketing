@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <div class="d-flex align-items-start justify-content-between">
            <h1 class="heading">Financial View</h1>
            <a href="{{route('generate-pdf',$form->id)}}">
                <button class="theme-btn">Download Receipt</button>
            </a>
        </div>
        <form id="add-financial">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="theme-label">Total Worth</label>
                    <input type="text" name="total_price" value="{{$form->total_price}}" id="total_worth" class="theme-input" placeholder="Total worth">
                </div>
                <div class="col-md-6">
                    <label for="" class="theme-label">Down Payment</label>
                    <input type="text" name="down_payment" value="{{$form->down_payment}}" class="theme-input" placeholder="Down payment">
                </div>
                <div class="col-md-6">
                    <label for="" class="theme-label">Dealers</label>
                    <select name="user_id" id="" class="theme-select">
                        <option value="" selected disabled>Select Dealer</option>
                        @foreach($dealers as $dealer)
                        <option {{isset($form) ? ($form->user_id == $dealer->id ? 'selected' : '') : (old('user_id') == $dealer->user_id ? 'selected' : '')}} value="{{$dealer->id}}">{{$dealer->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="row">
            <div class="col-6">
                <div class="border_info border-0">
                    <h5 class="mb-2">Total Installments</h5>
                    <p class="m-0 f-14"><b>{{\App\Models\Installment::where('forms_id',$id)->count()}}</b></p>
                </div>
            </div>
            <div class="col-6">
                <div class="border_info border-0">
                    <h5 class="mb-2">Total Payment</h5>
                    <p class="m-0 f-14"><b>{{\App\Models\Installment::where('forms_id',$id)->sum('amount')}}</b></p>
                </div>
            </div>
        </div>

        <label class="theme-label mt-3 ms-0 plots-type-label"><span class="f-16">Add Installment</span></label>
        <div class="row">
            <div class="col-sm-4">
                <label for="" class="theme-label">Installment #</label>
                <input type="text" name="name[]" class="theme-input" placeholder="Installment #">
            </div>
            <div class="col-sm-4">
                <label for="" class="theme-label">Amount</label>
                <input type="number" name="amount[]" class="theme-input" placeholder="Amount">
            </div>
            <div class="col-sm-4 d-flex">
                <div class="flex-grow-1">
                    <label for="" class="theme-label">Date</label>
                    <input type="date" name="installment_date[]" class="theme-input" placeholder="Date">
                </div>

                <button type="button" class="btn-none ms-2" id="installment-plus">
                    <img src="{{ asset('assets/images/svg/plus.svg') }}" alt="+" width="25" class="mt-2">
                </button>
            </div>
        </div>
        <div id="append-wrapper"></div>
        <div class="d-flex justify-content-end pt-3">
            <button class="theme-btn px-4">Add Installment
                <span class="spinner-border spinner-border-sm spinner" style="display: none"></span>
            </button>
        </div>
        <input type="hidden" name="id" value="{{$id}}">
    </form>

        <div class="row">
            @foreach($installemnts as $installment)
            <div class="col-sm-4">
                <div class="border_info">
                    <h5 class="mb-2">{{$installment->name}}</h5>
                    <p class="m-0"><b>{{$installment->amount}}</b></p>
                    <p class="m-0">{{$installment->installment_date}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#installment-plus').click(function() {
           $('#append-wrapper').append(`
                <div class="row">
                    <div class="col-sm-4">
                        <label for="" class="theme-label">Installment #</label>
                        <input type="text"  name="name[]" class="theme-input" placeholder="Installment #">
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="theme-label">Amount</label>
                        <input type="number"  name="amount[]"  class="theme-input" placeholder="Amount">
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="theme-label">Date</label>
                        <input type="date" name="installment_date[]" class="theme-input" placeholder="Date">
                    </div>
                </div>
           `);
        });
    });
</script>
<script>
    $("#add-financial").validate({
        rules: {
            total_worth: {
                required: true,
                maxlength: 50
            },
            down_payment: {
                required: true,
            }

        },
        submitHandler: function(form) {
            $(".spinner").show();
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('financial.add')}}",
                type: "POST",
                data: $(form).serialize(),
                success: function(response) {
                    $(".spinner").hide();
                    toastr.success(response.msg);
                    setTimeout(function(){ window.location = "{{route('dashboard.index')}}" }, 3000);
                },
                error: function(response) {

                }
            });
        }
    })
    </script>
 @endpush