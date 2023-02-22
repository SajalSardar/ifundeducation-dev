@extends('layouts.frontapp')

@section('title', $fundPost->title)

@section('content')
  <!-- breadcrumb  -->
  <section class="breadcrumb_section"
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">{{ $fundPost->title }}</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb end  -->

  <section id="fundraisers" class="fundraiser_page">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form method="POST" action="" class="account_content_area_form">

            <div class="d-flex mb-4">
              <div class="flex-shrink-0">
                <img src="{{ asset('storage/fundraiser_post/' . $fundPost->image) }}" width="100" class="rounded"
                  alt="{{ $fundPost->title }}">
              </div>
              <div class="flex-grow-1 ms-3">
                <h4>{{ $fundPost->title }}</h4>
                <p>{{ $fundPost->shot_description }}</p>
              </div>
            </div>
            <div class="border-top mb-3"></div>
            <div class="row">
              <div class='col-12 mb-3'>
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class='col-12 mb-3'>
                <div class="form-floating">
                  <input type="text" class="form-control" id="cartName" name="cartName" placeholder="Name on Card">
                  <label for="cartName">Name on Card</label>
                </div>
              </div>
              <div class='col-12 mb-3'>
                <div class="form-floating">
                  <input type="text" class="form-control" id="cardNumber" size='20' name="cardNumber"
                    placeholder="Card Number">
                  <label for="cardNumber">Card Number</label>
                </div>
              </div>

              <div class="col-12">
                <div class='row mb-3'>
                  <div class='col-md-4'>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="cardCVC" name="cardCVC" placeholder='ex. 311'
                        size='4'>
                      <label for="cardCVC">CVC</label>
                    </div>
                  </div>
                  <div class='col-md-4'>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="expiraMonth" name="expiraMonth" placeholder='MM'
                        size='2'>
                      <label for="expiraMonth">Expiration Month</label>
                    </div>
                  </div>
                  <div class=' col-md-4'>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="expiraYear" name="expiraYear" placeholder='YYYY'
                        size='4'>
                      <label for="expiraYear">Expiration Year</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class='col-12 mb-3'>
                <div class="form-floating">
                  <input type="number" class="form-control" id="amount" name="amount" placeholder='Amount'>
                  <label for="amount">Amount</label>
                </div>
              </div>
              <div class="col-12">
                <div class='row mb-3'>
                  <div class='col-md-6'>
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect">
                        <option selected disabled>Select Country</option>
                        @foreach ($countries as $country)
                          <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                      </select>
                      <label for="floatingSelect">Country</label>
                    </div>

                  </div>
                  <div class='col-md-6'>
                    <div class="form-floating">
                      <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder='Zip Code'>
                      <label for="zipCode">Zip</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class='col-12 mb-3 mt-3'>
                <label> <input type="checkbox" name="is_display_info"> Don't display my name publicly on the
                  fundraiser.</label>
              </div>
              <hr>

              <div>
                <h6>Your donation</h6>
                <div class="d-flex justify-content-between mt-3">
                  <div>
                    <p>Your donation</p>
                  </div>
                  <div>$ <span class="display_amount">0.00</span> </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                  <div>
                    <p>Platform Fee</p>
                  </div>
                  <div>$ <span class="display_platform_fee">0.00</span></div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mt-2">
                  <div>
                    <strong>Total</strong>
                  </div>
                  <div>$ <span class="display_total">0.00</span></div>
                </div>
              </div>

              <div class="col-12 mt-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Donate Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection

@section('script')
  <script>
    $(document).ready(function() {
      let amount = $('#amount'),
        display_amount = $('.display_amount'),
        display_platform_fee = $('.display_platform_fee'),
        display_total = $('.display_total');

      amount.on('change', function() {
        let fee = parseFloat((amount.val() * 3) / 100);
        let user_amount = parseInt(amount.val());
        amount.val(user_amount);
        display_amount.html(user_amount);
        display_platform_fee.html(fee);
        display_total.html(user_amount + fee);
      })

    });
  </script>
@endsection
