@extends('layouts.frontapp')
@section('title', 'Home')
@section('content')
    <!-- hero part  -->
    <section id="banner">
        <div class="banner_item" style="background:url({{ asset('frontend/images/banner.png') }})">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="banner_caption">
                        <h1>Fund An <span> Education Fund</span> A Future</h1>
                        <p>Dedicated fundraising platform for Education!</p>
                        <a href="#">Donate now!</a>
                        <div class="search_box mt-5">
                            <form action="">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Find fundraiser..">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i>
                                        Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero part end -->
    <!-- simple block part start  -->
    <section id="simple_block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="block_inner">
                        <i class="fa-regular fa-square-plus"></i>
                        <h3>Create Your Account</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, at.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block_inner">
                        <i class="fas fa-store"></i>
                        <h3>Share Your Story</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, at.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block_inner">
                        <i class="fa-regular fa-share-from-square"></i>
                        <h3>Share with friends and family</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, at.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- simple block part end  -->

    <!-- Fundraisers area start -->
    <section id="fundraisers">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_header">
                        <h2>Fundraisers</h2>
                        <a href="#">View All <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($fundRaiserPosts as $fundRaiserPost)
                    @if ($fundRaiserPost->donates->sum('amount') < $fundRaiserPost->goal)
                        <div class="col-lg-4 col-md-6">
                            <div class="fundraisers_card">
                                <div class="save_btn">
                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $fundRaiserPost->id }}" name="post_id">
                                        <a href="{{ route('wishlist.store') }}"
                                            onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                            class="{{ in_array($fundRaiserPost->id, $wishlists_id) == true ? 'active' : '' }}"><i
                                                class="fas fa-heart"></i></a>
                                    </form>

                                </div>
                                @if ($fundRaiserPost->image)
                                    <img src="{{ asset('storage/fundraiser_post/' . $fundRaiserPost->image) }}"
                                        alt="{{ $fundRaiserPost->title }}">
                                @else
                                    <img src="{{ Avatar::create($fundRaiserPost->title)->setBackground('#ddd')->setDimension(250)->setFontSize(16)->toBase64() }}"
                                        alt="{{ $fundRaiserPost->title }}">
                                @endif
                                <h3><a
                                        href="{{ route('front.fundraiser.post.show', $fundRaiserPost->slug) }}">{{ $fundRaiserPost->title }}</a>
                                </h3>
                                <ul class="fundraisers_card_sub">
                                    <li> <i
                                            class="fas fa-university"></i>{{ $fundRaiserPost->user->academic_profile->university->name }}
                                    </li>
                                </ul>
                                <ul class="fundraisers_card_sub">
                                    @foreach ($fundRaiserPost->fundraisercategories as $category)
                                        <li><i class="fas fa-tag text-dark"></i>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                                <p>{{ $fundRaiserPost->shot_description }}</p>
                                <div class="progress mt-3" style="height: 13px;">
                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                        aria-label="Example with label"
                                        style="width: {{ round(($fundRaiserPost->donates->sum('amount') * 100) / $fundRaiserPost->goal) }}%;"
                                        aria-valuenow="{{ round(($fundRaiserPost->donates->sum('amount') * 100) / $fundRaiserPost->goal) }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{ round(($fundRaiserPost->donates->sum('amount') * 100) / $fundRaiserPost->goal) }}%
                                    </div>
                                </div>
                                <ul class="fundraisers_card_bottom">
                                    <li>{{ round(($fundRaiserPost->donates->sum('amount') * 100) / $fundRaiserPost->goal) }}%
                                        <span>Funded</span>
                                    </li>
                                    <li>${{ $fundRaiserPost->goal }} <span>Target</span></li>
                                    <li>{{ $fundRaiserPost->end_date->diffInDays() }} <span>Day Left</span></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fundraisers area end -->

    <!-- Trust & Safety -->
    <section id="trust">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="trust_text">
                        <h3><i class="fa-solid fa-thumbs-up"></i> Trust</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, assumenda iure natus ipsum
                            vero soluta
                            ipsa molestiae adipisci sit error alias sapiente quasi maiores iste amet, quo labore
                            similique dolores?
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trust_text">
                        <h3><i class="fa-solid fa-shield-heart"></i> Safety</h3>
                        <p>Since 2010, GoFundMe has become a trusted leader in online fundraising, helping to raise and
                            deliver more
                            than $15 billion from over 200 million donations around the world.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trust & Safety end -->
@endsection
