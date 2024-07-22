@extends('layouts.backapp')
@section('title', 'Update Message')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">Message</li>
        </ul>
    </div>
@endsection


@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Message
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Campaign</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Read/unread</th>
                            <th style="text-align: right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->fundraiserpost->title }}</td>
                                <td>{{ $message->created_at->format('D m, Y') }}</td>
                                <td>{{ $message->status == 1 ? 'Active' : 'blocked' }}</td>
                                <td>{{ $message->admin_view == 1 ? 'read' : 'unread' }}</td>
                                <td style="text-align: right">
                                    <a href="{{ route('dashboard.campaign.message.admin.message.show', $message->id) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('dashboard.campaign.message.admin.message.status.update', $message->id) }}"
                                        class="btn btn-sm text-white {{ $message->status == 1 ? 'bg-danger' : 'bg-success' }}">{{ $message->status == 1 ? 'Block' : 'Active' }}</a>
                                </td>
                            </tr>
                        @endforeach
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
                searching: false,
                // order: [
                //     [3, 'desc']
                // ],
                ajax: {
                    url: "{{ route('dashboard.campaign.message.admin.all.message.datatable') }}",
                    type: "GET",
                    // data: function(d) {
                    //     d._token = "{{ csrf_token() }}";
                    //     d.title = $('select[name=title]').val();
                    //     d.donorname = $('input[name=donorname]').val();
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
                        name: 'title',
                        orderable: false
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
            $('#filterForm').on('submit', function(e) {
                dTable.draw();
                e.preventDefault();
            });
        })
    </script>
@endsection
