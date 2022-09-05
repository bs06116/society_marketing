@extends('layouts.app')
@section('content')

<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Dealers</h1>
        <div class="table-responsive">
            <table id="myTable" class="theme-table">
                <thead>
                    <tr>
                        <th>Dealers name</th>
                        <th>Phone Number</th>
                        <th>Total Sales Plots</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
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
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dealers-booked-plots') }}",
                    data: function(d) {
                        //   d.approved = $('#approved').val(),
                        //  d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'total_plots',
                        name: 'total_plots'
                    }
                ]
            });

            //   $('#approved').change(function(){
            //       table.draw();
            //   });

        });
    </script>

@endpush