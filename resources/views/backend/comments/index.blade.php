@extends('layouts.backapp')
@section('title', 'Comments')
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
            <li class="breadcrumb-item text-dark">Comments</li>
        </ul>
    </div>
@endsection


@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Comments
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="data-table">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th>ID</th>
                            <th>Comment</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Read/unread</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->name }} <br> {{ $comment->email }}</td>
                                <td>{{ $comment->created_at->format('M d, Y') }}</td>
                                <td>{{ $comment->status }}</td>
                                <td>{{ $comment->admin_view == 0 ? 'unread' : 'read' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('dashboard.campaign.comment.admin.comment.show', $comment->id) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('dashboard.campaign.comment.admin.comment.status.update', $comment->id) }}"
                                        class="btn btn-sm text-white {{ $comment->status === 'blocked' ? 'bg-success' : 'bg-danger' }}">{{ $comment->status === 'blocked' ? 'Active' : 'Block' }}</a>
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
                    url: "{{ route('dashboard.campaign.comment.admin.all.comment.datatable') }}",
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
                        data: 'comment',
                        name: 'comment',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
