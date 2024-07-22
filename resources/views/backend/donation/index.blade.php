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
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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
                        @forelse  ($all_donates as $donation)
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
