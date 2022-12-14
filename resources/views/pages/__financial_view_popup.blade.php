
<div class="file-info-main">

    @if ($result->image)
    @php
        $imageName = $result->image;
    @endphp
    @else
        @php
            $imageName = "logo.png";
        @endphp
    @endif

<div class="d-flex align-items-center mb-4 pb-2">
    <img src="{{ asset('assets/images/'.$imageName) }}" alt="" class="avatar">
    <div>
        <h6 class="name m-0">{{$result->applicant_name}}</h6>
        <p class="email m-0">{{$result->email}}</p>
        <p class="email m-0">{{$result->mobile_no}}</p>
        <p class="email m-0">{{$result->cnic}}</p>

    </div>
</div>

<div class="px-4">
    <div class="d-flex info">
        <h5 class="m-0">Block #</h5>
        <p class="m-0">{{$result->name}}</p>
    </div>
    <div class="d-flex info">
        <h5 class="m-0">Plot #</h5>
        <p class="m-0">{{$result->plot_no}}</p>
    </div>
    <div class="d-flex info">
        <h5 class="m-0">Street #</h5>
        <p class="m-0">{{$result->street_no}}</p>
    </div>
    <div class="d-flex info">
        <h5 class="m-0">Type</h5>
        <p class="m-0">{{$result->plot_type}}</p>
    </div>
    <div class="d-flex info">
        <h5 class="m-0">Plot Size</h5>
        <p class="m-0">{{$result->plot_size}}</p>
    </div>
</div>
<div class="flex-center selection-footer">
    <a href="{{url('edit-file',$result->id)}}"><button class="theme-btn me-2">File View</button></a>
    @canany(['view-financial'])
    <a href="{{ route('financial.view',$result->id) }}">
        <button class="theme-btn">Financial View</button>
    </a>
    @endcan

</div>
</div>