@extends('layouts.frontapp')
@section('title', 'User Profile')

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
                        <h3>My Profile</h3>

                        <div class="row">
                            <div class="col-12 mb-5">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#personal_profile" type="button">Personal Profile</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academic_profile"
                                            type="button">Academic Profile</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#social_profile"
                                            type="button">Social Profile</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="personal_profile">
                                    <form method="" action="" class="account_content_area_form">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label for="fname" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="lname" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="number" name="phone" class="form-control" id="phone">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="date" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="date">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="photo" class="form-label">Profile Photo</label>
                                                <input class="form-control" type="file" id="photo">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="inputAddress" class="form-label">Address</label>
                                                <input type="address" class="form-control" id="inputAddress" name="address">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputCountry" class="form-label">Country</label>
                                                <select id="inputCountry"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputCountry" tabindex="-1" aria-hidden="true">
                                                    <option selected="" data-select2-id="2">Select Country</option>
                                                    <option value="AFGHANISTAN">AFGHANISTAN</option>
                                                    <option value="ALBANIA">ALBANIA</option>
                                                    <option value="ALGERIA">ALGERIA</option>
                                                    <option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="1" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputCountry-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputCountry-container" role="textbox"
                                                                aria-readonly="true" title="Select Country">Select
                                                                Country</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputCity" class="form-label">City</label>
                                                <select id="inputCity"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputCity" tabindex="-1" aria-hidden="true">
                                                    <option selected="" disabled="" data-select2-id="4">Select City
                                                    </option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="3" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputCity-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputCity-container" role="textbox"
                                                                aria-readonly="true" title="Select City">Select
                                                                City</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputState" class="form-label">State</label>
                                                <select id="inputState"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputState" tabindex="-1" aria-hidden="true">
                                                    <option selected="" disabled="" data-select2-id="6">Select
                                                        State</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Alabama">Alabama</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="5" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputState-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputState-container" role="textbox"
                                                                aria-readonly="true" title="Select State">Select
                                                                State</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputZip" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="inputZip">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="academic_profile">
                                    <form method="" action="" class="account_content_area_form">
                                        <div class="row">

                                            <div class="col-lg-6 mb-3">
                                                <label for="inputcoll" class="form-label">College/University</label>
                                                <select id="inputcoll"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputcoll" tabindex="-1" aria-hidden="true">
                                                    <option selected="" data-select2-id="8">Select Country</option>
                                                    <option value="">AFGHANISTAN</option>
                                                    <option value="">ALBANIA</option>
                                                    <option value="">ALGERIA</option>
                                                    <option value="">AMERICAN SAMOA</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="7" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputcoll-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputcoll-container" role="textbox"
                                                                aria-readonly="true" title="Select Country">Select
                                                                Country</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputnotcoll" class="form-label">College/University (If not
                                                    listed)</label>
                                                <input type="text" class="form-control" id="inputnotcoll">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label for="inputStudyMajor" class="form-label">Study Major</label>
                                                <input type="text" class="form-control" id="inputStudyMajor">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputClassification" class="form-label">Classification</label>
                                                <select id="inputClassification"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputClassification" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option selected="" data-select2-id="10">Select</option>
                                                    <option value="Freshman">Freshman</option>
                                                    <option value="Sophomore">Sophomore</option>
                                                    <option value="Junior">Junior</option>
                                                    <option value="Senior">Senior</option>
                                                    <option value="Other">Other</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="9" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputClassification-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputClassification-container" role="textbox"
                                                                aria-readonly="true" title="Select">Select</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputCurrentGPA" class="form-label">Current GPA</label>
                                                <input type="text" class="form-control" id="inputCurrentGPA">
                                                <label class="pt-1">
                                                    <input class="form-check-input" type="checkbox"> Show GPA on visitor?
                                                </label>

                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputDegreeEnrolledIn" class="form-label">Degree
                                                    Enrolled</label>
                                                <select id="inputDegreeEnrolledIn"
                                                    class="form-select select_2 select2-hidden-accessible"
                                                    data-select2-id="inputDegreeEnrolledIn" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option selected="" data-select2-id="12">Select</option>
                                                    <option value="Undergraduate">Undergraduate</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Doctorate">Doctorate</option>
                                                    <option value="Associate">Associate</option>
                                                </select><span class="select2 select2-container select2-container--default"
                                                    dir="ltr" data-select2-id="11" style="width: 436px;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-inputDegreeEnrolledIn-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-inputDegreeEnrolledIn-container"
                                                                role="textbox" aria-readonly="true"
                                                                title="Select">Select</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="formFileMultiple" class="form-label">Class Schedule</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    multiple="">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="formFileMultiple" class="form-label">Transcript</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    multiple="">
                                            </div>


                                            <div class="col-12">
                                                <button type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="social_profile">
                                    <form method="" action="" class="account_content_area_form">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputlink" class="form-label">LinkedIn</label>
                                                <input type="text" class="form-control" id="inputlink">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputfb" class="form-label">Facebook</label>
                                                <input type="text" class="form-control" id="inputfb">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit">Submit</button>
                                            </div>
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
