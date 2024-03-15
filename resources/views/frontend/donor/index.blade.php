@extends('layouts.clientapp')
@section('title', 'Donation List')

@section('content')
    <div class="mb-5">
        <div class="account_content_area">
            <h3>Total Donate</h3>
            <div class="account_content_area_form">
                <form action="" method="GET" id="filterForm">
                    <div class="input-group">
                        <select class="form-select select2" name="title">
                            <option selected value="">All Fundraiser</option>
                            @foreach (@$fundposts as $fundpost)
                                <option value="{{ @$fundpost->id }}">{{ @$fundpost->title }}</option>
                            @endforeach
                        </select>
                        <input type="date" class="form-control" name="fromdate">
                        <div class="border">
                            <label class="form-label  px-2 mb-0 pt-2">to</label>
                        </div>
                        <input type="date" class="form-control" name="todate">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="account_content_area_form table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fundraiser Title</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(function($) {
            $('.select2').select2();

            var dTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [
                    [3, 'desc']
                ],
                ajax: {
                    url: "{{ route('donor.index.datatable') }}",
                    type: "GET",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.title = $('select[name=title]').val();
                        d.fromdate = $('input[name=fromdate]').val();
                        d.todate = $('input[name=todate]').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            });

            $('#filterForm').on('submit', function(e) {
                dTable.draw();
                e.preventDefault();
            });


        });
    </script>

@endsection
