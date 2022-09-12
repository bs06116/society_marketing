@extends('layouts.app')
@section('content')

<div class="main-padding">
    <div class="table-card">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <h1 class="heading">Blocks</h1>
            <a href="{{ route('blocks.create') }}">
                <button class="theme-btn me-2">Add New Block</button>
            </a>
        </div>
        <div class="table-responsive">
            <table id="myTable" class="theme-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Total street</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                    url: "{{ route('blocks.index') }}",
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
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'total_street',
                        name: 'total_street'
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