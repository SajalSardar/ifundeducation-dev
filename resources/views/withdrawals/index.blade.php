@extends('layouts.clientapp')
@section('title', 'Payout')

@section('content')
    <div class="mb-5">
        <div class="row">
            <div class="col-12">
                <div class="account_content_area">
                    <h3>Payout </h3>
                </div>
            </div>
            <div class="col-md-8">
                <div class="account_content_area pr-0">
                    <div class="account_content_area_form">
                        @if (!auth()->user()->stripe_account_id)
                            <div class="alert alert-info mt-3">
                                <p>Please, Setup Stripe Connect Account.</p>
                            </div>
                        @elseif ($payoutAttemptCount > 3)
                            <div class="alert alert-warning mt-3">
                                <p>Please try again later, as our system has made three payout attempts.</p>
                            </div>
                        @elseif ($payoutRequest > 0)
                            <div class="alert alert-success mt-3">
                                <p>Your One Payout request is procecing.</p>
                            </div>
                        @else
                            <p>You currently have
                                <strong>${{ number_format($balance->balance->curent_amount - $balance->balance->withdraw_amount, 2) }}</strong>
                                in earnings for next payout.
                            </p>
                            <form action="{{ route('withdrawals.verify') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                <button type="submit" class="btn btn-sm btn-success mt-3">Start
                                    Payout</button>
                            </form>
                        @endif

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="account_content_area ps-0">
                    <div class="account_content_area_form ">
                        @if (auth()->user()->stripe_account_id)
                            <div>
                                <img src="{{ asset('frontend/images/stripe-logo-1.png') }}" width="120"
                                    alt="Stripe Logo">
                                <p><strong>Name</strong>: {{ $stripeAccount['display_name'] }}</p>
                                <p><strong>Email</strong>: {{ $stripeAccount['email'] }}</p>
                                <p><strong>Added</strong>: {{ $stripeAccount['connected_date'] }}</p>
                            </div>
                            <a target="_blank" href="{{ route('withdrawals.stripe.login') }}"
                                class="btn btn-success btn-sm">Login Stripe</a>
                        @else
                            <img src="{{ asset('frontend/images/stripe-logo-1.png') }}" width="120" alt="Stripe Logo">
                            <br>
                            <a href="{{ route('withdrawals.stripe.account') }}" class="btn btn-primary btn-sm mt-3">Set
                                Stripe Account</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="account_content_area">
                    <h3>Payout History</h3>
                    <div class="account_content_area_form">
                        <table class="table">
                            <thead>
                                <tr class="table-dark">
                                    <th>SL</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payoutRequestall as $payout)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>${{ number_format($payout->amount, 2) }}</td>
                                        <td><span
                                                class="badge bg-{{ $payout->status == 'transfer' ? 'success' : 'warning' }}">{{ Str::ucfirst($payout->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $payout->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-info">Payout not found!</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $payoutRequestall->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Payout Form -->
    <div class="modal fade modal-md show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="staticBackdropLabel">
                        Payout Request
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You currently have
                    <strong>{{ $balance->balance->curent_amount - $balance->balance->withdraw_amount }}</strong>
                    in earnings for next payout.
                    <form action="" method="POST" class="mt-3">
                        @csrf
                        <div class="mt-2">
                            <input type="text" class="form-control" placeholder="Payout Amount"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                myModal.show();
            });
        </script> --}}

@endsection
