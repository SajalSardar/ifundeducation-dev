@extends('layouts.frontapp')
@section('title', 'Fundraiser Update Message')
@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">Fundraiser Message Edit</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>Fundraiser Message Edit
                            <a class="btn btn-sm btn-success float-end"
                                href="{{ route('fundraiser.post.message.index') }}">Back</a>
                        </h3>

                        <form method="POST"
                            action="{{ route('fundraiser.post.message.update', $fundraiserupdatemessage->id) }}"
                            class="account_content_area_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label d-block">Fundraising Post:<span
                                            class="text-danger">*</span></label>
                                    <select name="fundraiser_post" id="fundraiser_post"
                                        class="form-control @error('fundraiser_post') is-invalid @enderror">
                                        <option disabled selected>Select Post</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}"
                                                {{ $fundraiserupdatemessage->fundraiser_post_id === $post->id ? 'selected' : '' }}>
                                                {{ $post->title }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger" id="fundraiser_postErrorMsg"></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label d-block">Message Type:<span
                                            class="text-danger">*</span></label>
                                    <select name="message_type" id="message_type"
                                        class="form-control  @error('message_type') is-invalid @enderror">
                                        <option disabled selected>Select type</option>
                                        <option value="success"
                                            {{ $fundraiserupdatemessage->message_type === 'success' ? 'selected' : '' }}>
                                            Success
                                        </option>
                                        <option value="warning"
                                            {{ $fundraiserupdatemessage->message_type === 'warning' ? 'selected' : '' }}>
                                            Warning</option>
                                        <option value="danger"
                                            {{ $fundraiserupdatemessage->message_type === 'danger' ? 'selected' : '' }}>
                                            Danger</option>
                                    </select>
                                    <p class="text-danger" id="message_typeErrorMsg"></p>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="update_message" class="form-label">Message :<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('update_message') is-invalid @enderror" id="update_message" name="update_message"
                                        rows="5">{{ old('update_message', $fundraiserupdatemessage->message) }}</textarea>
                                    <p style="color: rgba(54, 76, 102, 0.7)">Maximum 150 Character.
                                    </p>
                                    <p class="text-danger" id="update_messageErrorMsg"></p>
                                </div>

                                <div class="col-12">
                                    <button type="submit">Update</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
