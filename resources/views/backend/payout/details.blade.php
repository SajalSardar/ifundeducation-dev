@extends('layouts.backapp')
@section('title', 'Transfer Request')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Transfer Request</h1>
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
            <li class="breadcrumb-item text-dark">Transfer Request</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Transfer Amount: ${{ $payout->amount }}</h2>
                <h4>Status: {{ $payout->status }}</h4>
                @if ($payout->status == 'processing')
                    <form action="{{ route('dashboard.fundraiser.payout.connect.transfer') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $payout->user->stripe_account_id }}" name="stripe_account_id">
                        <input type="hidden" value="{{ $payout->amount }}" name="amount">
                        <input type="hidden" value="{{ $payout->user->balance->id }}" name="balance">
                        <input type="hidden" value="{{ $payout->id }}" name="payout_id">
                        <button class="btn btn-sm btn-info mx-2">Tranfer Amount</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="15%"><strong>Name</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->first_name }} {{ $payout->user->last_name }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Email</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->email }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Stripe</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->stripe_account_id ? 'Stripe Connected' : 'Stripe Not Connected' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Status</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->status == 1 ? 'Active User' : 'Deactive User' }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="15%"><strong>Balance</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->balance->curent_amount }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Total Withdraw</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->user->balance->withdraw_amount }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

@endsection
