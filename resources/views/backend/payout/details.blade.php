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
                <h2>Transfer Request</h2>
                @if ($payout->status == 'processing')
                    <div class="d-flex">
                        <form action="{{ route('dashboard.fundraiser.payout.connect.transfer') }}" method="POST"
                            id="transfer_form">
                            @csrf
                            <input type="hidden" value="{{ $payout->user->stripe_account_id }}" name="stripe_account_id">
                            <input type="hidden" value="{{ $payout->amount }}" name="amount">
                            <input type="hidden" value="{{ $payout->user->balance->id }}" name="balance">
                            <input type="hidden" value="{{ $payout->id }}" name="payout_id">
                        </form>
                        <button class="btn btn-sm btn-info mx-2" id="transfer_btn">Tranfer Amount</button>

                        <button data-bs-toggle="modal" data-bs-target="#payout_review" class="btn btn-sm btn-primary ms-2">
                            Review Comment
                        </button>
                    </div>
                @endif

            </div>
            <div class="mt-5">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="15%"><strong>Transfer Amount</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->amount ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Transaction Id</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->balance_transaction ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>
                                Transaction Date</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->transaction_time ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Destination</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->destination ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Currency</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->currency ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Status</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $payout->status ?? '--' }}</td>
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
                        <td>${{ number_format($payout->user->balance->net_balance, 2) }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Total Withdraw</strong></td>
                        <td width="3%">:</td>
                        <td>${{ number_format($payout->user->balance->total_withdraw, 2) }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payout_review" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24px" height="24px" viewBox="0 0 24 24">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1">
                                    </rect>
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <div class=" mb-13">
                        <h2 class="mb-3">Comments*</h2>
                    </div>
                    <form action="{{ route('dashboard.fundraiser.payout.update.message') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <input type="hidden" value="review_comment" name="review_comment">
                            <input type="hidden" value="{{ $payout->id }}" name="payout_id">
                            <textarea name="comment" class="form-control form-control-solid " rows="8" required></textarea>
                        </div>
                        <div class="">
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $(document).on('click', '#transfer_btn', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Transfer This Fund!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, transfer!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#transfer_form').submit();
                    }
                });
            });
        });
    </script>
@endsection
