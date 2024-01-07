@extends('layouts.clientapp')
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
        <div class="container-fluid ps-0">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="account_content_area">
                                <h3>Payout Request</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="account_content_area">
                                <div class="account_content_area_form">

                                    You currently have
                                    <strong>{{ $balance->balance->curent_amount - $balance->balance->withdraw_amount }}</strong>
                                    in earnings for next payout.
                                    <form action="{{ route('withdrawals.payout.request') }}" method="POST" class="mt-3">
                                        @csrf
                                        <div class="mt-2">
                                            <input type="text" name="amount" class="form-control"
                                                placeholder="Payout Amount"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @error('amount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
