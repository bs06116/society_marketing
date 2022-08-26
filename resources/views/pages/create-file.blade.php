@extends('layouts.app')
@section('content')
<form method="POST" action="{{url('save-form')}}">
@csrf

<div class="main-padding">
    <div class="table-card">
        <h1 class="heading text-center">Application Form</h1>
        <div class="row mb-2">
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">App No</label>
                <input type="number" name="app_no" value="{{old('app_no')}}" class="theme-input" placeholder="App No">
                @if($errors->has('app_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('app_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Reg No</label>
                <input type="number" value="{{old('reg_no')}}" name="reg_no" class="theme-input" placeholder="Reg No">
                @if($errors->has('reg_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('reg_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Form No</label>
                <input type="number" value="{{old('form_no')}}" name="form_no" class="theme-input" placeholder="Form No">
                @if($errors->has('form_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('form_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <h1 class="small-heading">Commercial/Residential</h1>
        <div class="table-card mb-3">
            <label for="" class="theme-label ms-0"><span class="f-15">Preferred choice</span> <span class="f-13 weight-400">(Subject to Availibility)</span></label>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Type</label>
                    <select name="type" id="" class="theme-select category">
                        <option value="" selected disabled>Select type</option>
                        <option value="residential">Residential</option>
                        <option value="commercial">Commercial</option>
                        <option value="both">Both</option>
                    </select>
                    @if($errors->has('type')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Block/Sector</label>
                    <select name="block" id="" class="theme-select blocks">
                        <option value="" selected disabled>Select block/sector</option>
                    </select>
                    @if($errors->has('block')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('block') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Plot size</label>
                    <select name="plot_size" id="" class="theme-select plot_size">
                        <option value="" selected disabled>Select size</option>
                    </select>
                    @if($errors->has('plot_size')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('plot_size') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Plot No</label>
                    <input type="number" value="{{old('plot_no')}}" name="plot_no" class="theme-input" placeholder="Plot No">
                    @if($errors->has('plot_no')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('plot_no') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Street No</label>
                    <input type="number" value="{{old('street_no')}}" name="street_no" class="theme-input" placeholder="Street No">
                    @if($errors->has('street_no')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('street_no') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="" class="theme-label">Location/Type</label>
                    <input type="text" value="{{old('location_type')}}" name="location_type" class="theme-input" placeholder="Location/Type">
                    @if($errors->has('location_type')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('location_type') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="" class="theme-label me-3 pb-1">Preference of plot</label>
                    <div class="d-flex flex-wrap">
                        <label class="theme-checkbox me-3"><span class="d-inline-block">General</span>
                            <input type="checkbox" name="preference_of_plot" value="general" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Corner<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" name="preference_of_plot" value="corner" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Boulevard<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" name="preference_of_plot" value="boulevard" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Boulevard Corner<br><span class="weight-300">20% extra</span></span>
                            <input type="checkbox" name="preference_of_plot" value="boulevard corner" id="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="theme-checkbox me-3"><span class="d-inline-block">Park Facing<br><span class="weight-300">10% extra</span></span>
                            <input type="checkbox" name="preference_of_plot" value="park facing" id="">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    @if($errors->has('preference_of_plot')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('preference_of_plot') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6">
                <label for="" class="theme-label">Payment</label>
                <select name="payment" id="" class="theme-select">
                    <option value="" selected disabled>Select</option>
                    <option value="installment">Installment</option>
                    <option value="lump sum">Lump Sum</option>
                </select>
                @if($errors->has('payment')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('payment') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <h1 class="small-heading">For office use only</h1>
        <div class="table-card mb-3">
            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Extra Land</label>
                    <input type="text" value="{{old('extra_land')}}" name="extra_land" class="theme-input" placeholder="Extra land">
                    @if($errors->has('extra_land')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('extra_land') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Extra Land Cost</label>
                    <input type="number" name="extra_land_cost" value="{{old('extra_land_cost')}}" class="theme-input" placeholder="Extra land cost">
                    @if($errors->has('extra_land_cost')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('extra_land_cost') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Booking Data</label>
                    <input type="date" value="{{old('booking_date')}}" name="booking_date" class="theme-input" placeholder="Booking data">
                    @if($errors->has('booking_date')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('booking_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label for="" class="theme-label">Total Price</label>
                    <input type="number" value="{{old('total_price')}}" name="total_price" class="theme-input" placeholder="Total Price">
                    @if($errors->has('total_price')) 
                        <span class="fields-error" role="alert">
                            <strong style="color: red;">{{ $errors->first('total_price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <h1 class="small-heading">Personal information</h1>
        <div class="row">
            <div class="col-sm-6">
                <label for="" class="theme-label">Name of Applicant</label>
                <input type="text" value="{{old('name_of_applicant')}}" name="name_of_applicant" class="theme-input" placeholder="Name of applicant">
                @if($errors->has('name_of_applicant')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('name_of_applicant') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">S/O, D/0, W/O</label>
                <input type="text" value="{{old('applicant_type')}}" name="applicant_type" class="theme-input" placeholder="S/O, D/0, W/O">
                @if($errors->has('applicant_type')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('applicant_type') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">CNIC No</label>
                <input type="number" value="{{old('cnic_no')}}" name="cnic_no" class="theme-input" placeholder="CNIC No">
                @if($errors->has('cnic_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('cnic_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Passport No</label>
                <input type="number" value="{{old('passport_no')}}" name="passport_no" class="theme-input" placeholder="Passport No">
                @if($errors->has('passport_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('passport_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Mailing Address</label>
                <input type="text"value="{{old('mailing_address')}}"  name="mailing_address" class="theme-input" placeholder="Mailing address">
                @if($errors->has('mailing_address')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('mailing_address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Permanent Address</label>
                <input type="text" value="{{old('permanent_address')}}" name="permanent_address" class="theme-input" placeholder="Permanent address">
                @if($errors->has('permanent_address')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('permanent_address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Phone No</label>
                <input type="number" value="{{old('phone_no')}}" name="phone_no" class="theme-input" placeholder="Phone No">
                @if($errors->has('phone_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('phone_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Mobile No</label>
                <input type="number" value="{{old('mobile_no')}}" name="mobile_no" class="theme-input" placeholder="Mobile No">
                @if($errors->has('mobile_no')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('mobile_no') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="" class="theme-label">Email</label>
                <input type="email" value="{{old('email')}}" name="email" class="theme-input" placeholder="Email">
                @if($errors->has('email')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <h1 class="small-heading">Nominee information</h1>
        <div class="row">
            <div class="col-sm-6">
                <label for="" class="theme-label">Name of Applicant</label>
                <input type="text" value="{{old('nominee_name')}}" name="nominee_name" class="theme-input" placeholder="Name of applicant">
                @if($errors->has('nominee_name')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('nominee_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">S/O, D/0, W/O</label>
                <input type="text" value="{{old('nominee_type')}}" name="nominee_type" class="theme-input" placeholder="S/O, D/0, W/O">
                @if($errors->has('nominee_type')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('nominee_type') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">CNIC No</label>
                <input type="number" value="{{old('nominee_cnic')}}" name="nominee_cnic" class="theme-input" placeholder="CNIC No">
                @if($errors->has('nominee_cnic')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('nominee_cnic') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-6">
                <label for="" class="theme-label">Passport No</label>
                <input type="number" value="{{old('nominee_passport')}}" name="nominee_passport" class="theme-input" placeholder="Passport No">
                @if($errors->has('nominee_passport')) 
                    <span class="fields-error" role="alert">
                        <strong style="color: red;">{{ $errors->first('nominee_passport') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end pt-3">
            <button class="theme-btn" style="width:150px;">Create File</button>
        </div>
    </div>
</div>
</form>
<script>
    $(".category").on('change',function(){
        $(".plot_size").empty();
        $(".blocks").empty();
        var category = $(this).find(":selected").val();
        $.ajax({
         type: 'GET',
         url : "{{url('get-blocks')}}/"+category,
         success:function(response){
                var blocks = "<option value='' selected disabled>Select block/sector</option>";
                $(response).each(function(index, value){
                    blocks += `<option value="${value.id}">${value.name}</option>`;
                });

                $(".blocks").append(blocks);
         } 
       }); 
    });
    $(".blocks").on('change',function(){
        $(".plot_size").empty();
       var block_id = $(this).find(":selected").val();
       $.ajax({
         type: 'GET',
         url : "{{url('get-plot-size')}}/"+block_id,
         success:function(response){
                var size_options = "<option value='' selected disabled>Select size</option>";
                $(response).each(function(index, value){
                    size_options += `<option value="${value.id}">${value.plot_size}</option>`;
                });

                $(".plot_size").append(size_options);
         } 
       }); 
    });
</script>
@endsection