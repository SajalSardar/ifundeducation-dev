@extends('layouts.backapp')
@section('title', 'Theme Options')
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
            <li class="breadcrumb-item text-dark">General Settings</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card my-5">
        <div class="card-header pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Running Campaign</span>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.theme-options.general.update', $themeOption) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Platform Fee</label>
                            <input type="text" class="form-control" name="platform_fee"
                                value="{{ old('platform_fee', $themeOption->platform_fee) }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Minumum Payout</label>
                            <input type="text" class="form-control" name="min_payout"
                                value="{{ old('min_payout', $themeOption->min_payout) }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Minumum Donation</label>
                            <input type="text" class="form-control" name="min_donation"
                                value="{{ old('min_donation', $themeOption->min_donation) }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
