@extends('layouts.backapp')
@section('title', 'Donation List')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Donation List</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">Donation List</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card my-5">
        <div class="card-body">
            <form action="" method="GET" id="filterForm">
                <div class="row">

                    <div class="col-lg-3 px-0">
                        <select class="form-select" data-control="select2" data-hide-search="false" name="title">
                            <option value="">All running campaign</option>
                            @foreach ($fundposts as $fundpost)
                                <option value="{{ $fundpost->id }}">{{ $fundpost->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input type="date" class="form-control" name="fromdate">
                        <p class="text-gray-400">Start date</p>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input type="date" class="form-control" name="todate">
                        <p class="text-gray-400">End date</p>
                    </div>
                    <div class="col-sm-2 col-lg-2 px-0">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Donations</span>
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Campaign</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Donor</th>
                            <th>Read/Unread</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse  ($all_donates as $donation)
                            <tr>
                                <td>{{ $donation->id }}</td>
                                <td>{{ $donation->title }}</td>
                                <td>${{ number_format($donation->amount, 2) }}</td>
                                <td>{{ $donation->created_at->isoFormat('MMM D, YYYY') }}</td>
                                <td>
                                    {{ $donation->donar_name ? $donation->donar_name : 'Guest' }}
                                </td>
                                <td>{{ $donation->admin_view == 0 ? 'unread' : 'read' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.campaign.donation.admin.donation.show', $donation->id) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p>Donation not Found!</p>
                                </td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->

            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection


@section('script')
    <script>
        $(function() {
            var dTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('dashboard.campaign.donation.admin.donation.list.datatable') }}",
                    type: "GET",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.title = $('select[name=title]').val();
                        d.fromdate = $('input[name=fromdate]').val();
                        d.todate = $('input[name=todate]').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'donor',
                        name: 'donor'
                    },
                    {
                        data: 'admin_view',
                        name: 'admin_view',
                    },
                    {
                        data: 'action_column',
                        name: 'action_column'
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
