@extends('layouts.frontapp')
@section('title', 'User Dashboard')

@section('content')
    <!-- breadcrumb  -->
    <section class="breadcrumb_section"
        style="
--bs-breadcrumb-divider: url(
  &#34;data:image/svg + xml,
  %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='%236c757d'/%3E%3C/svg%3E&#34;
);
">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">iFundraiser</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>

                <div class="col-sm-4">
                    <div class=" text-center">
                        <p>
                            Account type:
                            @foreach (auth()->user()->roles as $role)
                                <span class="badge bg-success">{{ Str::upper($role->name) }}</span>
                            @endforeach
                        </p>


                        @if (auth()->user()->hasRole('donor'))
                            @if (auth()->user()->hasRole('fundraiser') &&
                                auth()->user()->hasRole('donor'))
                            @else
                                <a href="{{ route('make.role.fundraiser') }}" class="btn btn-primary">Make Fundraiser</a>
                            @endif

                        @endif
                        @if (auth()->user()->hasRole('fundraiser'))
                            @if (auth()->user()->hasRole('fundraiser') &&
                                auth()->user()->hasRole('donor'))
                            @else
                                <a href="{{ route('make.role.donor') }}" class="btn btn-primary">Make Donor</a>
                            @endif

                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="profile_photo text-end">
                        <img src="{{ asset('frontend/images/1.png') }}" alt="" width="70">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">

                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>My Dashboard</h3>
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-6">
                                <div class="count_box">
                                    <div class="user_icon">
                                        <i class="fas fa-money-check"></i>
                                    </div>
                                    <h4>Total Balance</h4>
                                    <p>$1200</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="count_box">
                                    <div class="user_icon">
                                        <i class="fas fa-money-bill-trend-up"></i>
                                    </div>
                                    <h4>Total Withdraw</h4>
                                    <p>$1200</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="count_box">
                                    <div class="user_icon">
                                        <i class="fas fa-money-bill-trend-up"></i>
                                    </div>
                                    <h4>Available Balannce</h4>
                                    <p>$1200</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="count_box">
                                    <div class="user_icon">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <h4>Received Fund</h4>
                                    <p>$1000</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="count_box">
                                    <div class="user_icon">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <h4>My Donation </h4>
                                    <p>$1000</p>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6 text-start pt-5 pt-xl-0">
                                <div class="donar_card">
                                    <h4 class="border-bottom pb-3 mb-2">
                                        Resent Donation
                                        <a href="#" class="float-end view_donar">See All</a>
                                    </h4>
                                    <div class="d-flex align-items-center border-bottom py-3">
                                        <div class="user_icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="donar_info">
                                            <h5>Abc</h5>
                                            <ul class="fundraisers_card_sub">
                                                <li>$10</li>
                                                <li>3 days ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center border-bottom py-3">
                                        <div class="user_icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="donar_info">
                                            <h5>One</h5>
                                            <ul class="fundraisers_card_sub">
                                                <li>$10</li>
                                                <li>3 days ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center border-bottom py-3">
                                        <div class="user_icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="donar_info">
                                            <h5>Anonymous</h5>
                                            <ul class="fundraisers_card_sub">
                                                <li>$10</li>
                                                <li>3 days ago</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
