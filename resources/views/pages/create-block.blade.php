@extends('layouts.app')
@section('content')
<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Add Block</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Block Name</label>
                <input type="text" class="theme-input" placeholder="Block name">
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Plot Category</label>
                <select name="" id="plot-catgeory" class="theme-select">
                    <option value="" selected disabled>Select Category</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="both">Both</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Total Streets</label>
                <input type="number" class="theme-input" placeholder="Total Streets">
            </div>
        </div>
        <div>
            <label for="" class="theme-label ms-0 plots-type-label" style="display:none;"><span class="f-16">Residential</span></label>
            <div class="row">
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <label for="" class="theme-label">Plot Size</label>
                            <select name="" id="plot-size" class="theme-select">
                                <option value="" selected disabled>Select size</option>
                                <option value="75x90">75x90</option>
                                <option value="50x90">50x90</option>
                                <option value="35x70">35x70</option>
                                <option value="30x60">30x60</option>
                                <option value="25x50">25x50</option>
                                <option value="25x45">25x45</option>
                                <option value="25x40">25x40</option>
                                <option value="25x30">25x30</option>
                            </select>
                        </div>
                        <button type="button" class="btn-none plot-size-plus">
                            <img src="{{ asset('assets/images/svg/plus.svg') }}" alt="+" width="25" class="mt-2">
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <label for="" class="theme-label">Plots</label>
                    <input type="number" class="theme-input" placeholder="Plots">
                </div>
            </div>
        </div>
        <div class="commercialPlots-wrapper pt-3" style="display:none;">
            <label for="" class="theme-label ms-0 plots-type-label" style="display:none;"><span class="f-16">Commercial</span></label>
            <div class="row">
                <div class="col-lg-4 col-md-6 plot-size-divs">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <label for="" class="theme-label">Plot Size</label>
                            <select name="" id="plot-size" class="theme-select">
                                <option value="" selected disabled>Select size</option>
                                <option value="30x40">30x40</option>
                                <option value="25x40">25x40</option>
                                <option value="40x50">40x50</option>
                                <option value="25x30">25x30</option>
                            </select>
                        </div>
                        <button type="button" class="btn-none plot-size-plus">
                            <img src="{{ asset('assets/images/svg/plus.svg') }}" alt="+" width="25" class="mt-2">
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <label for="" class="theme-label">Plots</label>
                    <input type="number" class="theme-input" placeholder="Plots">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end pt-3">
            <button class="theme-btn" style="width:150px;">Add Block</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#plot-catgeory').change(function(){
            $('.plot-size-append-divs').remove();
            $('.plot-size-divs').show();
            var plotCategory = $(this).val();
            if(plotCategory == 'residential'){
                $('.commercialPlots-wrapper, .plots-type-label').hide();
                $('#plot-size').html(`
                    <option value="" selected disabled>Select size</option>
                    <option value="75x90">75x90</option>
                    <option value="50x90">50x90</option>
                    <option value="35x70">35x70</option>
                    <option value="30x60">30x60</option>
                    <option value="25x50">25x50</option>
                    <option value="25x45">25x45</option>
                    <option value="25x45">25x40</option>
                    <option value="25x30">25x30</option>
                `);
            }else if(plotCategory == 'commercial'){
                $('.commercialPlots-wrapper, .plots-type-label').hide();
                $('#plot-size').html(`
                    <option value="" selected disabled>Select size</option>
                    <option value="30x40">30x40</option>
                    <option value="25x40">25x40</option>
                    <option value="40x50">40x50</option>
                    <option value="25x30">25x30</option>
                `);
            }else if(plotCategory == 'both'){
                $('.commercialPlots-wrapper, .plots-type-label').show();
            }
        });
        $('.plot-size-plus').click(function(){
            var parentHtml = $(this).parent().find('.flex-grow-1').html();
            $(this).parent().parent().parent().after(`
                <div class="row plot-size-append-divs">
                    <div class="col-lg-4 col-md-6 plot-size-div">
                        ${parentHtml}
                    </div>
                    <div class="col-lg-4 col-md-6 plot-size-divs">
                        <label for="" class="theme-label">Plots</label>
                        <input type="number" class="theme-input" placeholder="Plots">
                    </div>
                </div>
            `);
        });
    });
</script>
@endsection
@push('scripts')
<script>
$("#register-form").validate({
    rules: {
        name: {
            required: true,
            maxlength: 50
        },
        username: {

            required: true,
        },
        number: {
            required: true,
            maxlength: 15
        },
        whatsapp_no: {
            required: true,
            maxlength: 15
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 20
        },

    },

    messages: {

        name: {
            required: "الرجاء إدخال الاسم",
            maxlength: "يجب ألا يزيد طول اسمك عن 50 حرفًا"
        },
        number: {
            required: "رقم الهاتف مطلوب",
            maxlength: "يجب أن يكون الحد الأقصى لطول الرقم 15 حرفًا"
        },
        whatsapp_no: {
            required: "رقم الهاتف مطلوب",
            maxlength: "يجب أن يكون الحد الأقصى لطول الرقم 15 حرفًا"
        },
        email: {
            required: "البريد الالكتروني مطلوب",
            email: "رجاء قم بإدخال بريد الكتروني صحيح"
        },
        password: {
            required: "كلمة المرور مطلوبة",
            maxlength: "يجب ألا تزيد كلمة مرورك عن 20 حرفًا",
            minlength: "يجب أن تكون كلمة المرور الخاصة بك أكثر من 5 أحرف"
        },
        username: {
            required: "اسم المستخدم مطلوب",
            minlength: "يجب أن يكون طول اسم المستخدم أكبر من 5 أرقام",
            maxlength: "يجب أن يكون طول اسم المستخدم أقل من 12 رقمًا"
        },
        store_category: {
            required: "الفئة مطلوبة"
        }

    },
    submitHandler: function(form) {
        event.preventDefault();

        $.ajax({
            url: "{{route('register')}}",
            type: "POST",
            data: dataSet,
            processData: false,
            contentType: false,
            success: function(response) {


            },
            error: function(response) {
                $.each(response.responseJSON.errors, function(field_name, error) {
                    $(document).find(`[name="${field_name}"]`).after(
                    `<label class="error request-error">${error}</label>`)
                })
                $('.submit-trigger').removeAttr('disabled');
            }
        });
    }
})
</script>
@endpush