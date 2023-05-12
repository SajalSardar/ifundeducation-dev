@extends('layouts.backapp')
@section('title', 'Footer Menu')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}">
@endsection
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
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard.page-options.footer-menu.index') }}" class="text-muted text-hover-primary">Footer Menu</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">Edit Menu Item</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <form action="{{ route('dashboard.page-options.footer-menu.update', $footerMenu) }}" method="POST">
            @csrf
            @method('PUT')
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column" style="display: inline-block;">
                    <span class="card-label fw-bolder fs-3 mb-1">Footer Menu (Edit Menu Item)</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="" data-bs-original-title="Click to Update Menu Item" style="display: inline-block; float: right;">
                <button type="submit" class="btn btn-sm btn-primary">
                    Update Menu Item
                </button>
            </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">

                <div class="m-5 p-5">
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Name</span>
                        </label>
                        <input type="text" class="form-control form-control-solid " placeholder="Enter Name" name="name" value="{{ $footerMenu->name }}">
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="">Link</span>
                        </label>
                        <input type="text" class="form-control form-control-solid " placeholder="Enter Link" name="link" value="{{ $footerMenu->link }}">
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="">Status</span>
                        </label>
                        <select name="status" class="form-control form-control-solid ">
                            <option {{$footerMenu->status<>1?'selected':''}} value="0">Inactive</option>
                            <option {{$footerMenu->status==1?'selected':''}} value="1">Active</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                        <span class="indicator-label">
                            Update Menu Item
                        </span>
                    </button>
                </div>
            </div>
            <!--begin::Body-->
        </form>
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
