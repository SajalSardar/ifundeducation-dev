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
                            <span class="fw-semibold">Account type:</span>
                            @foreach (auth()->user()->roles as $role)
                                <span class="badge bg-success">{{ Str::upper($role->name) }}</span>
                            @endforeach



                            @if (auth()->user()->hasRole('donor'))
                                @if (auth()->user()->hasRole('fundraiser') &&
                                    auth()->user()->hasRole('donor'))
                                @else
                                    <a href="{{ route('make.role.fundraiser') }}" class="btn btn-sm btn-info">Make
                                        Fundraiser</a>
                                @endif

                            @endif
                            @if (auth()->user()->hasRole('fundraiser'))
                                @if (auth()->user()->hasRole('fundraiser') &&
                                    auth()->user()->hasRole('donor'))
                                @else
                                    <a href="{{ route('make.role.donor') }}" class="btn btn-sm btn-info">Make Donor</a>
                                @endif

                            @endif
                        </p>
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
                                <ul class="nav nav-tabs" id="fundeducationTab">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#personal_profile" type="button">Personal Profile</button>
                                    </li>
                                    @if (auth()->user()->hasRole('fundraiser'))
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#academic_profile"
                                                type="button">Academic Profile</button>
                                        </li>
                                    @endif
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
                                                <label for="fname" class="form-label">First Name:<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->first_name }}" id="fname" name="fname">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="lname" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->last_name }}" id="lname" name="lname">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="email" class="form-label">E-mail: <span
                                                        class="text-danger">*</span> </label>
                                                <input type="email" value="{{ auth()->user()->email }}"
                                                    class="form-control" id="email" name="email">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="phone" class="form-label">Phone:<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone"
                                                    value="{{ auth()->user()->personal_profile->phone ?? '' }}"
                                                    class="form-control" id="phone">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="date" class="form-label">Date of Birth:<span
                                                        class="text-danger">*</span></label>
                                                <input type="date"
                                                    value="{{ !empty(auth()->user()->personal_profile)? auth()->user()->personal_profile->birthday->format('Y-m-d') ?? '': '' }}"
                                                    class="form-control" id="date">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Gender:<span class="text-danger">*</span></label>
                                                <br>

                                                <label>
                                                    <input type="radio" name="gender" value="male"
                                                        {{ !empty(auth()->user()->personal_profile) && auth()->user()->personal_profile->gender === 'male' ? 'checked' : '' }}>
                                                    Male
                                                </label>:
                                                <label class="ms-2 d-inline-block">
                                                    <input type="radio" name="gender" value="female"
                                                        {{ !empty(auth()->user()->personal_profile) && auth()->user()->personal_profile->gender === 'female' ? 'checked' : '' }}>
                                                    Female
                                                </label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="inputAddress" class="form-label">Address:</label>
                                                <input type="text" placeholder="address"
                                                    value="{{ auth()->user()->personal_profile->address ?? '' }}"
                                                    class="form-control" id="inputAddress" name="address">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputCountry" class="form-label">Country:</label>
                                                <select id="inputCountry" class="form-select select_2">
                                                    <option selected>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputState" class="form-label">State:</label>
                                                <select id="inputState" class="form-select select_2 " disabled>

                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputCity" class="form-label">City:</label>
                                                <select id="inputCity" class="form-select select_2" disabled>

                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="inputZip" class="form-label">Zip Code:</label>
                                                <input type="text"
                                                    value="{{ auth()->user()->personal_profile->zip_code ?? '' }}"
                                                    class="form-control" id="inputZip">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="photo" class="form-label">Profile Photo:</label>
                                                <input class="form-control" type="file" id="photo">
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
                                                <select id="inputcoll" class="select_2">
                                                    <option selected disabled>Select Country</option>
                                                    <option value="">AFGHANISTAN</option>
                                                    <option value="">ALBANIA</option>
                                                    <option value="">ALGERIA</option>
                                                    <option value="">AMERICAN SAMOA</option>
                                                </select>
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
                                                <select id="inputClassification" class="select_2">
                                                    <option selected="">Select</option>
                                                    <option value="Freshman">Freshman</option>
                                                    <option value="Sophomore">Sophomore</option>
                                                    <option value="Junior">Junior</option>
                                                    <option value="Senior">Senior</option>
                                                    <option value="Other">Other</option>
                                                </select>
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
                                                <select id="inputDegreeEnrolledIn" class="select_2">
                                                    <option selected="">Select</option>
                                                    <option value="Undergraduate">Undergraduate</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Doctorate">Doctorate</option>
                                                    <option value="Associate">Associate</option>
                                                </select>
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

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select_2').select2();


            var inputCountry = $('#inputCountry');
            var inputState = $('#inputState');
            var inputCity = $('#inputCity');

            inputCountry.on('change', function() {

                inputState.removeAttr('disabled');
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.profile.state') }}",
                    data: {
                        country_id: inputCountry.val(),
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        inputState.html(data);
                    }

                });


            });

            inputState.on('change', function() {

                inputCity.removeAttr('disabled');
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.profile.city') }}",
                    data: {
                        state_id: inputState.val(),
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        inputCity.html(data);
                    }

                });


            });

        });
    </script>
@endsection
