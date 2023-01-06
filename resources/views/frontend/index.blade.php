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
                <div class="col-lg-4 col-md-6">

                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#" class="active"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fundraisers_card">
                        <div class="save_btn">
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                        <img src="{{ asset('frontend/images/1.png') }}" alt="">
                        <h3><a href="single-fundraiser.html">Origin Learning Fund</a></h3>
                        <ul class="fundraisers_card_sub">
                            <li> <i class="fas fa-university"></i>University</li>
                            <li><i class="fas fa-tag text-dark"></i>Tuition</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus maxime beatae harum reiciendis
                            quasi, ab
                            dolores iusto suscipit</p>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                aria-label="Example with label" style="width: 74%;" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">74%</div>
                        </div>
                        <ul class="fundraisers_card_bottom">
                            <li>74% <span>Funded</span></li>
                            <li>$100,000 <span>Target</span></li>
                            <li>127 <span>Days</span></li>
                        </ul>
                    </div>
                </div>
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
