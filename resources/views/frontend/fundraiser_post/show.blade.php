@extends('layouts.frontapp')

@section('title', $fundRaiserPost->title)

@section('content')
    <!-- breadcrumb  -->
    <section class="breadcrumb_section"
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item active">{{ $fundRaiserPost->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end  -->

    <section id="fundraisers" class="fundraiser_page">
        <div class="container ">
            <div class="row fundraisers_card">
                <div class="col-xl-3 border-end">
                    @if ($fundRaiserPost->image)
                        <img src="{{ asset('storage/fundraiser_post/' . $fundRaiserPost->image) }}"
                            alt="{{ $fundRaiserPost->title }}">
                    @else
                        <img src="{{ Avatar::create($fundRaiserPost->title)->setBackground('#ddd')->setDimension(250)->setFontSize(16)->toBase64() }}"
                            alt="{{ $fundRaiserPost->title }}">
                    @endif
                    <h3>{{ $fundRaiserPost->title }}</h3>
                    <ul class="fundraisers_card_sub pt-2 ">
                        @foreach ($fundRaiserPost->fundraisercategories as $category)
                            <li><i class="fas fa-tag text-dark"></i>{{ $category->name }}</li>
                        @endforeach
                        <li>
                            <a href="#" class="view_donar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="far fa-eye"></i>View Profile</a>
                        </li>
                    </ul>
                    <ul class="fundraisers_card_sub">
                        <li> <i
                                class="fas fa-university"></i>{{ $fundRaiserPost->user->academic_profile->university->name }}
                        </li>
                    </ul>
                </div>
                <div class="col-xl-5 border-end">
                    <div class="text-start px-lg-4 profile_info mt-4">
                        <h4>$1,095 <span>USD raised of ${{ $fundRaiserPost->goal }} goal</span></h4>
                        <div class="progress mt-3" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <strong class="mt-2 d-block">7 donations</strong>
                        <p class="mt-3">{{ $fundRaiserPost->shot_description }}</p>
                        <div class="d-sm-flex justify-content-between mt-4 pt-2">
                            <div class="buttons">
                                <a href="#">Donate</a>
                            </div>
                            <div class="social_profile mt-4 mt-sm-0" id="social-links">
                                <ul class="footer_social text-start">
                                    <li><strong class="me-3">Share:</strong></li>
                                    <li><a class="social-button"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="social-button"
                                            href="https://twitter.com/intent/tweet?url={{ Request::url() }}"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a class="social-button"
                                            href="http://www.linkedin.com/shareArticle?url={{ Request::url() }}"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 ps-lg-4 text-start  pt-5 pt-xl-0">
                    <h4 class="border-bottom pb-3 mb-2">Top Donars
                        <!-- <a href="#" class="float-end view_donar">See All</a> -->
                    </h4>
                    <div class="d-flex  align-items-center border-bottom py-3">
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
                    <div class="d-flex  align-items-center border-bottom py-3">
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
                    <div class="d-flex  align-items-center border-bottom py-3">
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


            <div class="row fundraisers_description_area">
                <div class="col-12 ">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#story">Story</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#update">Update</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#comments">Comments</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#donars">All
                                Donars</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#professional_experience">Professional Experience</button>
                        </li>
                    </ul>
                    <div class="tab-content text-start" id="myTabContent">
                        <div class="tab-pane fade show active" id="story">
                            <div class="text-start pb-3 mt-4">
                                {!! $fundRaiserPost->story !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="update">

                            <div class="mt-4">
                                @forelse ($fundRaiserPost->fundraiserupdatemessage as $message)
                                    <div class="alert {{ $message->message_type === 'success' ? 'alert-success' : ($message->message_type === 'danger' ? 'alert-danger' : 'alert-warning') }}"
                                        role="alert">
                                        {{ $message->message }}
                                    </div>
                                @empty
                                    <div>
                                        <h4>No Massage Found!</h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade blog" id="comments">
                            <div class="blog-comments">
                                <div class="reply-form">
                                    <h4>Leave a Reply</h4>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <form action="" class="mt-2">
                                        <div class="row">
                                            <div class="col-md-6 form-group"> <input name="name" type="text"
                                                    class="form-control" placeholder="Your Name*"></div>
                                            <div class="col-md-6 form-group"> <input name="email" type="text"
                                                    class="form-control" placeholder="Your Email*"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <input name="subject" type="text" class="form-control"
                                                    placeholder="Your Subject">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <textarea name="comment" rows="5" class="form-control" placeholder="Your Comment*"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </form>
                                </div>
                                <h4 class="comments-count border-bottom py-3 mt-3">8 Comments</h4>
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img">
                                            <img src="images/comments-2.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div>
                                            <h5>
                                                <a href="">Georgia Reader</a>
                                                <a href="#" class="reply">
                                                    <i class="fas fa-reply"></i>
                                                    Reply</a>
                                            </h5>
                                            <time datetime="2020-01-01">01 Jan, 2020</time>
                                            <p> Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad
                                                aut sapiente quis
                                                molestiae est qui cum soluta. Vero aut rerum vel.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="comment-2" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img">
                                            <img src="images/comments-2.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div>
                                            <h5>
                                                <a href="">Aron Alvarado</a>
                                                <a href="#" class="reply">
                                                    <i class="fas fa-reply"></i>
                                                    Reply
                                                </a>
                                            </h5>
                                            <time datetime="2020-01-01">01 Jan, 2020</time>
                                            <p> Ipsam tempora sequi voluptatem quis sapiente non..</p>
                                        </div>
                                    </div>
                                    <div id="comment-reply-1" class="comment comment-reply">
                                        <div class="d-flex">
                                            <div class="comment-img">
                                                <img src="images/comments-2.jpg" class="rounded-circle" alt="">
                                            </div>
                                            <div>
                                                <h5>
                                                    <a href="">Lynda Small</a>
                                                    <a href="#" class="reply">
                                                        <i class="fas fa-reply"></i>
                                                        Reply</a>
                                                </h5>
                                                <time datetime="2020-01-01">01 Jan, 2020</time>
                                                <p> Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam
                                                    aspernatur ut vitae
                                                    quia mollitia id non..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img">
                                            <img src="images/comments-2.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div>
                                            <h5>
                                                <a href="">Georgia Reader</a>
                                                <a href="#" class="reply">
                                                    <i class="fas fa-reply"></i>
                                                    Reply</a>
                                            </h5>
                                            <time datetime="2020-01-01">01 Jan, 2020</time>
                                            <p> Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad
                                                aut sapiente quis
                                                molestiae est qui cum soluta. Vero aut rerum vel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="donars">
                            <div class="col-lg-8 p-4">
                                <div class="d-flex  align-items-center border-bottom py-3">
                                    <div class="user_icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="donar_info ms-3">
                                        <h4>Abc</h4>
                                        <ul class="fundraisers_card_sub">
                                            <li>$10</li>
                                            <li>3 days ago</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex  align-items-center border-bottom py-3">
                                    <div class="user_icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="donar_info ms-3">
                                        <h4>Abc</h4>
                                        <ul class="fundraisers_card_sub">
                                            <li>$10</li>
                                            <li>3 days ago</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="professional_experience">
                            <div class="text-start pb-3 mt-4">
                                {!! $fundRaiserPost->user->academic_profile->experience !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <!-- profile modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        {{ $fundRaiserPost->user->first_name . ' ' . $fundRaiserPost->user->last_name }} Profile
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->first_name . ' ' . $fundRaiserPost->user->last_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>E-mail</strong></td>
                            <td>:</td>
                            <td> {{ $fundRaiserPost->user->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone Number</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->birthday->isoFormat('D MMM YYYY') }}</td>
                        </tr>
                        <tr>
                            <td><strong>University</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->academic_profile->university->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Classification </strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->academic_profile->classification->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Classification </strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->academic_profile->enrolleddegree->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Study Major </strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->academic_profile->study }}</td>
                        </tr>
                        @if ((bool) $fundRaiserPost->user->academic_profile->show_gpa === true)
                            <tr>
                                <td><strong>Current GPA</strong></td>
                                <td>:</td>
                                <td>{{ $fundRaiserPost->user->academic_profile->gpa }}</td>
                            </tr>
                        @endif
                        @if ((bool) $fundRaiserPost->user->academic_profile->show_schedule === true)
                            <tr>
                                <td><strong>Class Schedule</strong></td>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('storage/class_schedule/' . $fundRaiserPost->user->academic_profile->schedule) }}"
                                        alt="" width="100">
                                    <a href="{{ asset('storage/class_schedule/' . $fundRaiserPost->user->academic_profile->schedule) }}"
                                        class="lightBox btn btn-sm btn-success">View Schedule </a>
                                </td>
                            </tr>
                        @endif
                        @if ((bool) $fundRaiserPost->user->academic_profile->show_transcript === true)
                            <tr>
                                <td><strong>Transcript</strong></td>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('storage/transcript/' . $fundRaiserPost->user->academic_profile->transcript) }}"
                                        alt="" width="100">
                                    <a href="{{ asset('storage/transcript/' . $fundRaiserPost->user->academic_profile->transcript) }}"
                                        class="lightBox btn btn-sm btn-success">View Transcript </a>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->gender }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Country</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->country->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>State</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->state->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>City</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->city->name }}</td>
                        </tr>

                        <tr>
                            <td><strong>Zip</strong></td>
                            <td>:</td>
                            <td>{{ $fundRaiserPost->user->personal_profile->zip_code }}</td>
                        </tr>
                        <tr>
                            <td><strong>Social Profile</strong></td>
                            <td>:</td>
                            <td>
                                <div class="social_profile ">
                                    <ul class="footer_social text-start">
                                        @if ($fundRaiserPost->user->userSocial->instagram)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->instagram }}"
                                                    title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->linkedin)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->linkedin }}"
                                                    title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->facebook)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->facebook }}"
                                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->twitter)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->twitter }}"
                                                    title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->youtube)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->youtube }}"
                                                    title="youtube"><i class="fab fa-youtube"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->tiktok)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->tiktok }}"
                                                    title="Tiktok"><i class="fab fa-tiktok"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->pinterest)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->pinterest }}"
                                                    title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->snapchat)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->snapchat }}"
                                                    title="snapchat"><i class="fab fa-snapchat-ghost"></i></a></li>
                                        @endif
                                        @if ($fundRaiserPost->user->userSocial->website)
                                            <li><a href="{{ $fundRaiserPost->user->userSocial->website }}"
                                                    title="Website"><i class="fas fa-globe-americas"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- profile modal end -->
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script>
        new VenoBox({
            selector: ".lightBox"
        });

        //social share js 
        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-button', function(e) {
            var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width=' + popupSize.width + ',height=' + popupSize.height +
                ',left=' + verticalPos + ',top=' + horisontalPos +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
@endsection
