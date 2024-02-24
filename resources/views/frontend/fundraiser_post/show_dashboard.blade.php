@extends('layouts.clientapp')
@section('title')
    {{ $singlePost->title }}
@endsection

@section('content')
    <div class=" mb-5">
        <div class="account_content_area">
            <h3>{{ $singlePost->title }}</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="20%"><strong>Raised</strong></td>
                        <td width="3%">:</td>
                        <td>${{ number_format($singlePost->donates->sum('net_balance'), 2) }}</td>
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
                        <td>${{ number_format($singlePost->goal, 2) }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>End Date</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $singlePost->end_date->format('M d, Y') }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Short Description</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $singlePost->shot_description }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Description</strong></td>
                        <td width="3%">:</td>
                        <td>{!! Str::limit($singlePost->story, 200, '...') !!}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Date Created</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $singlePost->created_at->format('M d, Y') }}</td>
                    </tr>

                </table>
            </div>

        </div>
        <div class="account_content_area mt-5">
            <h3>Donations:</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Donation Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($singlePost->donates as $donate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donate->donar_name }}</td>
                                <td>${{ number_format($donate->net_balance, 2) }}</td>
                                <td>{{ $donate->created_at->format('M d, Y') }}</td>
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
                            <th>#</th>
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
                            <th>#</th>
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
@endsection
