@extends('layouts.clientapp')
@section('title', 'Funding Posts')

@section('content')

    <div>
        <div class="account_content_area">
            <h3>My Fundraisers</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Target</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function($) {

            var dTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('fundraiser.post.datatable') }}',

                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'goal',
                        name: 'goal',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action_column',
                        name: 'action_column'
                    }
                ]
            });
            // $('#filterForm').on('submit', function(e) {
            //     dTable.draw();
            //     e.preventDefault();
            // });


            $('.running_campaign').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Restart this Fundraiser!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Running It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            })
            $('.stop_campaign').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    text: "Stop this Fundraiser!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Stop It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            })

            $(document).on('click', '.post_delete', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit();
                    }
                });
            })
        });
    </script>

@endsection
