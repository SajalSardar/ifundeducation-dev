@extends('layouts.backapp')
@section('title', 'All Fundraiser Category')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Fundraiser Campaign</h1>
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
            <li class="breadcrumb-item text-dark">Campaign</li>
        </ul>
    </div>
@endsection
@section('content')
    <div>
        <x-campaignbutton />
    </div>
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Running Campaign</span>
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="data-table">
                    <!--begin::Table head-->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Target</th>
                            <th>Created</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>

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
    @error('name')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                padding: '1em',
                customClass: {
                    'title': 'alert_title',
                    'icon': 'alert_icon',
                    'timerProgressBar': 'bg-danger',
                }
            });
        </script>
    @enderror
    <script>
        $(function() {
            var dTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('dashboard.fundraiser.campaign.campaign.all.datatable') }}",
                    type: "GET",
                    // data: function(d) {
                    //     d._token = "{{ csrf_token() }}";
                    //     d.title = $('select[name=title]').val();
                    //     d.fromdate = $('input[name=fromdate]').val();
                    //     d.todate = $('input[name=todate]').val();
                    // }
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
            $('#filterForm').on('submit', function(e) {
                dTable.draw();
                e.preventDefault();
            });
        });
    </script>
@endsection
