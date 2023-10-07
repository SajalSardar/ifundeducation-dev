@extends('layouts.frontapp')
@section('title')
    {{ $singlePost->title }}
@endsection

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">Funding Post</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>Title: {{ $singlePost->title }}</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tr>
                                    <td width="20%"><strong>Raised</strong></td>
                                    <td width="3%">:</td>
                                    <td>{{ $singlePost->donates->sum('net_balance') }}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Status</strong></td>
                                    <td width="3%">:</td>
                                    <td><span
                                            class="badge bg-{{ $singlePost->status == 'running' ? 'success' : ($singlePost->status == 'pending' ? 'warning' : 'danger') }}">{{ Str::ucfirst($singlePost->status) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Goal</strong></td>
                                    <td width="3%">:</td>
                                    <td>{{ $singlePost->goal }}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>End Date</strong></td>
                                    <td width="3%">:</td>
                                    <td>{{ $singlePost->end_date->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Shot Desctription</strong></td>
                                    <td width="3%">:</td>
                                    <td>{{ $singlePost->shot_description }}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Long Desctription</strong></td>
                                    <td width="3%">:</td>
                                    <td>{!! Str::limit($singlePost->story, 200, '...') !!}</td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Created Date</strong></td>
                                    <td width="3%">:</td>
                                    <td>{{ $singlePost->created_at->format('d M Y') }}</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <div class="account_content_area mt-5">
                        <h3>Donation:</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($singlePost->donates as $donate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $donate->donar_name }}</td>
                                            <td>{{ $donate->net_balance }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-info">Donation Not Found!</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr></tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                    <div class="account_content_area mt-5">
                        <h3>Comments:</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($singlePost->comments as $comment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td><span class="badge bg-primary">{{ $comment->status }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-info">Comments Not Found!</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr></tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                    <div class="account_content_area mt-5">
                        <h3>Update Message:</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>message</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($singlePost->fundraiserupdatemessage as $message)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td><span class="badge bg-primary">{{ $message->message_type }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-info">Message Not Found!</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr></tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection