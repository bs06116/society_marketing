@extends('layouts.app')
@section('content')
<div class="main-padding">
    <form id="add-block">
    <div class="table-card">
        <h1 class="heading">Add Block</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Block Name</label>
                <input type="text" class="theme-input" id="name" name="name" placeholder="Block name">
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Plot Category</label>
                <select id="plot-catgeory" name="plot_catergory" class="theme-select">
                    <option value="" selected disabled>Select Category</option>
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="both">Both</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6">
                <label for="" class="theme-label">Total Streets</label>
                <input type="number" class="theme-input" name="total_street" placeholder="Total Streets">
            </div>
        </div>
        <div>
            <label for="" class="theme-label ms-0 plots-type-label" style="display:none;"><span class="f-16">Residential</span></label>
            <div class="row">
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <label for="" class="theme-label">Plot Size</label>
                            <select  id="plot-size" name="plot_size[]" class="theme-select">
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
                        <button type="button" data-val="residential" class="btn-none plot-size-plus">
                            <img src="{{ asset('assets/images/svg/plus.svg') }}" alt="+" width="25" class="mt-2">
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <label for="" class="theme-label">Plots</label>
                    <input type="number" class="theme-input" name="total_plot[]" placeholder="Plots">
                </div>
                <input type="hidden" name="block_category[]" value="residential">
            </div>
        </div>
        <div class="commercialPlots-wrapper pt-3" style="display:none;">
            <label for="" class="theme-label ms-0 plots-type-label" style="display:none;"><span class="f-16">Commercial</span></label>
            <div class="row">
                <div class="col-lg-4 col-md-6 plot-size-divs">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <label for="" class="theme-label">Plot Size</label>
                            <select  id="plot-size" name="plot_size[]" class="theme-select">
                                <option value="" selected disabled>Select size</option>
                                <option value="30x40">30x40</option>
                                <option value="25x40">25x40</option>
                                <option value="40x50">40x50</option>
                                <option value="25x30">25x30</option>
                            </select>
                        </div>
                        <button type="button" data-val="commercial" class="btn-none plot-size-plus">
                            <img src="{{ asset('assets/images/svg/plus.svg') }}" alt="+" width="25" class="mt-2">
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 plot-size-divs" style="display:none;">
                    <label for="" class="theme-label">Plots</label>
                    <input type="number" class="theme-input" name="total_plot[]" placeholder="Plots">
                </div>
            </div>
            <input type="hidden" name="block_category[]" value="commercial">

        </div>

        <div class="d-flex justify-content-end pt-3">
            <button class="theme-btn" style="width:150px;">Add Block</button>
        </div>
    </div>
</form>
</div>
@endsection
@push('scripts')
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
           var residentHtml =  $(this).attr('data-val');
           var plot_category = '';
           if(residentHtml == 'commercial'){
            plot_category = '<input type="hidden"  name="block_category[]" value="commercial">';
           }else{
            plot_category = '<input type="hidden"  name="block_category[]" value="residential">';
           }
           var parentHtml = $(this).parent().find('.flex-grow-1').html();
            $(this).parent().parent().parent().after(`
                <div class="row plot-size-append-divs">
                    <div class="col-lg-4 col-md-6 plot-size-div">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                ${parentHtml}
                            </div>
                            <button type="button" class="btn-none plot-size-minus">
                                <img src="{{ asset('assets/images/svg/minus.svg') }}" alt="-" width="25" class="mt-2">
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 plot-size-divs">
                        <label for="" class="theme-label">Plots</label>
                        <input type="number" class="theme-input" name="total_plot[]" placeholder="Plots">
                    </div>
                    ${plot_category}
                </div>
            `);
        });
    });
    $(document).on('click', '.plot-size-minus', function() {
        $(this).parent().parent().parent().remove();
    });
</script>
<script>
$("#add-block").validate({
    rules: {
        name: {
            required: true,
            maxlength: 50
        },
        plot_catergory: {

            required: true,
        },
        total_street: {
            required: true,
            maxlength: 15
        },

    },
    submitHandler: function(form) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('blocks.store')}}",
            type: "POST",
            data: $(form).serialize(),
            success: function(response) {
                toastr.success(response.msg);
                setTimeout(function(){ window.location = "{{route('blocks.index')}}" }, 3000);

            },
            error: function(response) {

            }
        });
    }
})
</script>
@endpush