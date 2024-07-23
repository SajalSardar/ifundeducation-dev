@extends('layouts.backapp')
@section('title', 'Payout Report')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Payout Report</h1>
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
            <li class="breadcrumb-item text-dark">Report</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Search Report</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-lg-3 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Fundraiser</label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="false"
                            data-placeholder="Select Fundraiser" name="user">
                            <option value="all">All</option>
                            @foreach ($fundraisers as $fundraiser)
                                <option value="{{ $fundraiser->id }}">
                                    {{ $fundraiser->first_name . ' ' . $fundraiser->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Campaign</label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="false"
                            data-placeholder="Select Campaign" name="campaign">
                            <option value="all">All</option>
                            @foreach ($campaigns as $campaign)
                                <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                    </button>
                </div>

                {{-- <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Name</span>
                    </label>
                    <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror"
                        placeholder="Enter Category Name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}

            </form>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Payout Report</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th>Id</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Request Date</th>
                            <th>Transfer Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payouts as $payout)
                            <tr>
                                <td>{{ $payout->id }}</td>
                                <td>{{ $payout->user->first_name . ' ' . $payout->user->last_name }}
                                    <br> {{ $payout->user->email }}
                                </td>
                                <td>{{ $payout->status }}</td>
                                <td>{{ $payout->created_at->format('D m, Y') }}</td>
                                <td>{{ $payout->updated_at->format('D m, Y') }}</td>
                                <td>${{ number_format($payout->amount, 2) }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <p>
                                        Payout Not Found!
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
