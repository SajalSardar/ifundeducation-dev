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
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Campaign</span>
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Target</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @forelse  ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ Str::limit($post->title, 20, '...') }}</td>
                                <td>
                                    @foreach ($post->fundraisercategories as $categoty)
                                        <span class="badge bg-success">{{ $categoty->name }}</span>
                                    @endforeach
                                </td>
                                <td>${{ number_format($post->goal, 2) }}</td>
                                <td>{{ $post->end_date->isoFormat('D MMM YYYY') }}</td>
                                <td>
                                    <span
                                        class="badge badge-{{ $post->status == 'running' ? 'success' : ($post->status == 'pending' ? 'warning' : 'danger') }}">{{ Str::ucfirst($post->status) }}</span>
                                <td>
                                    <a href="{{ route('dashboard.fundraiser.campaign.campaign.show', $post->slug) }}"
                                        class="btn btn-sm btn-primary" title="View">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p>No Post Found!</p>
                                </td>
                            </tr>
                        @endforelse
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
            })
        </script>
    @enderror
@endsection
