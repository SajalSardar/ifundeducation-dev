@extends('layouts.frontapp')
@section('title', 'User Profile')

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">iFundraiser</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>Start Fundraiser</h3>
                        <form method="" action="" class="account_content_area_form">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="fund_title" class="form-label">Fundraiser Title :</label>
                                    <input type="text" class="form-control" id="fund_title" name="title">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="goal" class="form-label">Fundraising Goal :</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fas fa-dollar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="goal" name="goal">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="" class="form-label">Fundraising End Date :</label>
                                    <input type="date" class="form-control" name="end_date" id="date"
                                        placeholder="mm/dd/yy">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label d-block">Fundraising For :</label>
                                    <select name="" id="" class="form-control select_2" multiple>
                                        <option disabled>Select Options</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="story" class="form-label">Tell Your Story :</label>
                                    <textarea class="form-control" id="story" name="story"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="" class="form-label">Add Image :</label>
                                    <input class="form-control" type="file" id="" multiple>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"> I agree the terms &amp;
                                            conditions
                                        </label>
                                    </div>
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
    </section>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        $('.select_2').select2();
        //editor
        ClassicEditor
            .create(document.querySelector('#story'), {
                ckfinder: {
                    uploadUrl: '',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
