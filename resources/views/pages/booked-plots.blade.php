@extends('layouts.app')
@section('content')

<div class="main-padding">
    <div class="table-card">
        <h1 class="heading">Booked Plots</h1>
        <div class="table-responsive">
            <table id="myTable" class="theme-table">
                <thead>
                    <tr>
                        <th>Dealers name</th>
                        <th>Block</th>
                        <th>Plot Number</th>
                        <th>Action</th>
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
                    url: "{{ route('book.plot') }}",
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
                        data: 'block',
                        name: 'block'
                    },
                    {
                        data: 'plot_number',
                        name: 'plot_number'
                    },
                    {
                        data: 'action',
                        name: 'actions'
                    }
                ]
            });

            //   $('#approved').change(function(){
            //       table.draw();
            //   });

        });
    </script>
    <script>
        $('.data-table tbody').on('click', '.delete', function(e) {
                e.preventDefault();
                let that = jQuery(this);
                jQuery.confirm({
                    icon: 'fas fa-wind-warning',
                    closeIcon: true,
                    title: 'Are you sure!',
                    content: 'You can not undo this action.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: function() {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        cancel: function() {
                            //$.alert('Canceled!');
                        }
                    }
                });

        });
    </script>
@endpush