@extends('layouts.frontapp')
@section('title', 'FAQs')
@section('content')
    <!-- breadcrumb  -->
    <section class="breadcrumb_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">iFundraiser</a></li>
                        <li class="breadcrumb-item active">FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end  -->

    <!-- faq part start -->
    <section id="page_block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_header text-center">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center about_row">
                <div class="col-md-12">
                    <div class="about_page_content">

                        <div class="accordion " id="accordionFaq">
                            <div class="accordion-item faq">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne">
                                        <i class="far fa-circle-question"></i> The first item's accordion body
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p><strong>This is the first item's accordion body.</strong> It is shown by default,
                                            until the
                                            collapse plugin adds the appropriate classes that we use to style each element.
                                            These classes
                                            control the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can
                                            modify any of this with custom CSS or overriding our default variables. It's
                                            also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>, though
                                            the transition
                                            does limit overflow.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item faq">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo">
                                        <i class="far fa-circle-question"></i> You can modify any of this with custom
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p><strong>This is the second item's accordion body.</strong> It is hidden by
                                            default, until the
                                            collapse plugin adds the appropriate classes that we use to style each element.
                                            These classes
                                            control the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can
                                            modify any of this with custom CSS or overriding our default variables. It's
                                            also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>, though
                                            the transition
                                            does limit overflow.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item faq">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree">
                                        <i class="far fa-circle-question"></i> It's also worth noting that just
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body">
                                        <p><strong>This is the third item's accordion body.</strong> It is hidden by
                                            default, until the
                                            collapse plugin adds the appropriate classes that we use to style each element.
                                            These classes
                                            control the overall appearance, as well as the showing and hiding via CSS
                                            transitions. You can
                                            modify any of this with custom CSS or overriding our default variables. It's
                                            also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>, though
                                            the transition
                                            does limit overflow.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- faq part end -->
@endsection
