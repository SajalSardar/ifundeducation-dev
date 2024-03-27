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
            <li class="breadcrumb-item text-dark">{{ $currentPost->title }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Update Request</span>
            </h3>
            <div class="card-toolbar">


                <a href="" class="btn btn-sm btn-info mx-2">Accept</a>
                <a href="" class="btn btn-sm btn-warning mx-2">Cancel</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="15%">
                            <strong>Fundraiser</strong>
                        </td>
                        <td width="3%">:</td>
                        <td>
                            {{ $currentPost->title }}
                            <br>
                            <p class="bg-info badge mb-0">to <i class="fas fa-long-arrow-alt-down"></i></p>
                            <p>{{ $updatePost->title }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Category</strong></td>
                        <td width="3%">:</td>
                        <td>
                            @foreach ($currentPost->fundraisercategories as $category)
                                <span class="badge badge-success">{{ $category->name }}</span>
                            @endforeach
                            <p class="bg-info badge my-1">to <i class="fas fa-long-arrow-alt-right"></i></p>
                            @foreach ($updateCategories as $category)
                                <span class="badge badge-success">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Status</strong></td>
                        <td width="3%">:</td>
                        <td><span class="badge badge-warning">{{ Str::ucfirst($updatePost->status) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Goal</strong></td>
                        <td width="3%">:</td>
                        <td>
                            ${{ number_format($currentPost->goal, 2) }}
                            <p class="bg-info badge my-1">to <i class="fas fa-long-arrow-alt-right"></i></p>
                            ${{ number_format($updatePost->goal, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>End Date</strong></td>
                        <td width="3%">:</td>
                        <td>
                            {{ $currentPost->end_date->format('d M Y') }}
                            <p class="bg-info badge my-1">to <i class="fas fa-long-arrow-alt-right"></i></p>
                            {{ $updatePost->end_date->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Shot Desctription</strong></td>
                        <td width="3%">:</td>
                        <td>
                            {{ $currentPost->shot_description }}
                            <br>
                            <p class="bg-info badge my-1">to <i class="fas fa-long-arrow-alt-down"></i></p>
                            <br>
                            {{ $updatePost->shot_description }}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Desctription</strong></td>
                        <td width="3%">:</td>
                        <td>
                            {!! $currentPost->story !!}

                            <p class="bg-info badge m-0">to <i class="fas fa-long-arrow-alt-down"></i></p>
                            <br>
                            {!! $updatePost->story !!}
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Created Date</strong></td>
                        <td width="3%">:</td>
                        <td>
                            {{ $currentPost->created_at->format('d M Y') }}
                            <p class="bg-info badge m-0">to <i class="fas fa-long-arrow-alt-right"></i></p>
                            {{ $updatePost->created_at->format('d M Y') }}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <!--begin::Body-->
    </div>

@endsection
