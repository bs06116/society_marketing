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
                    <button class="theme-btn ms-3 mt-1" onclick="checkApplication()">Search
                        <span class="spinner-border spinner-border-sm spinner" style="display: none"></span>

                    </button>
                </div>
                <p id="msg"></p>
                {{-- <p class="text-danger">This plot has already been sold.</p>
                <label for="" class="pb-1 theme-label f-14 green-clr">This Plot is Available!</label> --}}
                <label class="theme-checkbox me-3" id="book_plot" style="display: none"><span class="d-inline-block f-14">Book Plot</span>
                    <input type="checkbox" value="true" onclick="checkApplication()" id="book_plot_user">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
function checkApplication() {
          $(".spinner").show();
          console.info($("#book_plot_user").is(':checked'));
          var block_id = $("#block_id").val();
          var plot_number = $("#plot_number").val();
            $.ajax({
                url: "{{ route('appliction.check') }}",
                type: "POST",
                data: {
                    block_id : block_id,
                    plot_number : plot_number,
                    check_book_plot : $("#book_plot_user").is(':checked'),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $(".spinner").hide();
                    if(response.data == 2){
                        toastr.success(response.msg);
                        setTimeout(function(){ window.location = "{{route('dashboard-dealer')}}" }, 1000);
                       return;
                    }
                    if (response.success == true) {
                       //console.info(response.data.id);
                       $("#msg").html(`<p class="text-danger">${response.msg}</p>`);
                    }else{
                        if(response.data){
                            $("#book_plot").show();
                        }
                        $("#msg").html(`<p class="text-success">${response.msg}</p>`);
                    }
                },
            });
     }
</script>
@endpush