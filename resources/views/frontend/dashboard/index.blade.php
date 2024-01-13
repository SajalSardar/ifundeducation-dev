@extends('layouts.clientapp')
@section('title', 'User Dashboard')

@section('content')
    <div class="mb-5">
        <div class="account_content_area">
            <h3>My Dashboard</h3>
            <div class="row justify-content-center">
                @hasrole('fundraiser')
                    <div class="col-lg-4 col-sm-6">
                        <div class="count_box">
                            <div class="user_icon">
                                <i class="fas fa-money-check"></i>
                            </div>
                            <h4>Total Balance</h4>
                            <p>${{ number_format(auth()->user()->balance->curent_amount, 2) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="count_box">
                            <div class="user_icon">
                                <i class="fas fa-money-bill-trend-up"></i>
                            </div>
                            <h4>Total Withdraw</h4>
                            <p>${{ number_format(auth()->user()->balance->withdraw_amount, 2) }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="count_box">
                            <div class="user_icon">
                                <i class="fas fa-money-bill-trend-up"></i>
                            </div>
                            <h4>Available Balannce</h4>
                            <p>${{ number_format(auth()->user()->balance->curent_amount - auth()->user()->balance->withdraw_amount, 2) }}
                            </p>
                        </div>
                    </div>
                @endhasrole

                {{-- <div class="col-lg-4 col-sm-6">
                <div class="count_box">
                    <div class="user_icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h4>My Donation </h4>
                    <p>$1000</p>
                </div>
            </div> --}}
            </div>

            @hasrole('fundraiser')
                <div class="row my-3">
                    <div class="col-lg-6 text-start pt-5 pt-xl-0">
                        <div class="donar_card">
                            <h4 class="border-bottom pb-3 mb-2">
                                Resent Donation
                                <a href="{{ route('donate.index') }}" class="float-end view_donar">See All</a>
                            </h4>

                            @forelse(auth()->user()->all_donars->take(5) as $donar)
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="user_icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="donar_info">
                                        <h5>{{ $donar->display_publicly === 'yes' ? $donar->donar_name : 'Guest' }}
                                        </h5>
                                        <ul class="fundraisers_card_sub">
                                            <li>${{ number_format($donar->net_balance, 2) }}</li>
                                            <li>{{ $donar->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex align-items-center border-bottom py-3">

                                    <div class="donar_info">
                                        <p>No Donar Found!</p>
                                    </div>
                                </div>
                            @endforelse


                        </div>
                    </div>
                </div>
            @endhasrole

        </div>
    </div>
@endsection
