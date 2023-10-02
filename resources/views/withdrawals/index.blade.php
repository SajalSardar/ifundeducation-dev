@extends('layouts.frontapp')
@section('title', 'withdrawals')

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">withdrawals</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>Withdrawals</h3>
                        <div class="account_content_area_form">
                            @if (auth()->user()->stripe_account_id)
                                <a target="_blank" href="{{ route('withdrawals.stripe.login') }}"
                                    class="btn btn-primary btn-sm">View Stripe
                                    Account</a>
                            @else
                                <a href="{{ route('withdrawals.stripe.account') }}" class="btn btn-primary btn-sm">Connect
                                    Stripe Account</a>
                            @endif
                        </div>


                    </div>
                    @if (@$usersAmount->all_donars[0]->balance > 0)
                        <div class="account_content_area">
                            <h3>Transfer To Stripe Account</h3>
                            <div class="account_content_area_form">
                                {{ round($usersAmount->all_donars[0]->balance, 2) }}
                                <a href="{{ route('withdrawals.stripe.transfer') }}"
                                    class="btn btn-primary btn-sm">Transfer</a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
