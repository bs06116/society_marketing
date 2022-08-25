@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <div class="d-flex align-items-start justify-content-between">
            <h1 class="heading">Financial View</h1>
            <button class="theme-btn">Download Receipt</button>
        </div>

        <form id="add-financial">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="theme-label">Total Worth</label>
                    <input type="number" name="total_worth" id="total_worth" class="theme-input" placeholder="Total worth">
                </div>
                <div class="col-md-6">
                    <label for="" class="theme-label">Down Payment</label>
                    <input type="number" name="down_payment" class="theme-input" placeholder="Down payment">
                </div>
            </div>
        <div class="row">
            <div class="col-6">
                <div class="border_info border-0">
                    <h5 class="mb-2">Total Installments</h5>
                    <p class="m-0 f-14"><b>12</b></p>
                </div>
            </div>
            <div class="col-6">
                <div class="border_info border-0">
                    <h5 class="mb-2">Total Payment</h5>
                    <p class="m-0 f-14"><b>100000</b></p>
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
            <button class="theme-btn px-4">Add Installment</button>
        </div>
    </form>

        <div class="row">
            <div class="col-sm-4">
                <div class="border_info">
                    <h5 class="mb-2">Insallment 1</h5>
                    <p class="m-0"><b>6000</b></p>
                    <p class="m-0">2/20/2020</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="border_info">
                    <h5 class="mb-2">Insallment 2</h5>
                    <p class="m-0"><b>6,300</b></p>
                    <p class="m-0">2/20/2020</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="border_info">
                    <h5 class="mb-2">Insallment 3</h5>
                    <p class="m-0"><b>36,333</b></p>
                    <p class="m-0">2/20/2020</p>
                </div>
            </div>
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
                    toastr.success(response.msg);
                    setTimeout(function(){ window.location = "{{route('forms.index')}}" }, 3000);

                },
                error: function(response) {

                }
            });
        }
    })
    </script>
 @endpush