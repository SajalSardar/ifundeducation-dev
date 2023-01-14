@extends('layouts.frontapp')
@section('title', 'User Dashboard')

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">iFundraiser</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </x-breadcrumb>
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
