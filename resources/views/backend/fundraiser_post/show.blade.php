@extends('layouts.backapp')
@section('title', 'All Fundraiser Category')
@section('breadcrumb')
    <div data-kt-place="true" data-kt-place-mode="prepend"
        data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
        class="page-title d-flex align-items-center me-3">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Fundraiser Campaign</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard.index') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <li class="breadcrumb-item text-dark">{{ $fundRaiserPost->title }}</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ Str::upper($fundRaiserPost->title) }}</span>
            </h3>
            @if ($fundRaiserPost->status != 'draft')
                <div class="card-toolbar">
                    @if ($fundRaiserPost->status != 'block')
                        <a href="{{ route('dashboard.fundraiser.campaign.campaign.status', [$fundRaiserPost->id, 1]) }}"
                            class="btn btn-sm btn-success">
                            {{ $fundRaiserPost->status == 'running' ? 'Make Pending' : 'Make Active' }}
                        </a>
                    @endif

                    <a href="{{ route('dashboard.fundraiser.campaign.campaign.status', [$fundRaiserPost->id, 2]) }}"
                        class="btn btn-sm btn-info mx-2">
                        {{ $fundRaiserPost->status == 'block' ? 'Unblock' : 'Make Block' }}
                    </a>
                </div>
            @endif
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <tr>
                        <td width="15%"><strong>Raised</strong></td>
                        <td width="3%">:</td>
                        <td>${{ number_format($fundRaiserPost->donates->sum('net_balance'), 2) }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Status</strong></td>
                        <td width="3%">:</td>
                        <td><span
                                class="badge badge-{{ $fundRaiserPost->status == 'running' ? 'success' : ($fundRaiserPost->status == 'pending' ? 'warning' : 'danger') }}">{{ Str::ucfirst($fundRaiserPost->status) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Category</strong></td>
                        <td width="3%">:</td>
                        <td>

                            <span class="badge badge-success">{{ $fundRaiserPost->fundraisercategory->name }}</span>

                        </td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Goal</strong></td>
                        <td width="3%">:</td>
                        <td>${{ number_format($fundRaiserPost->goal, 2) }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>End Date</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $fundRaiserPost->end_date->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Shot Desctription</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $fundRaiserPost->shot_description }}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Desctription</strong></td>
                        <td width="3%">:</td>
                        <td>{!! $fundRaiserPost->story !!}</td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Created Date</strong></td>
                        <td width="3%">:</td>
                        <td>{{ $fundRaiserPost->created_at->format('d M Y') }}</td>
                    </tr>

                </table>
            </div>
        </div>
        <!--begin::Body-->
    </div>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Donation</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fundRaiserPost->donates as $donate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donate->donar_name }}</td>
                                <td>{{ $donate->donar_email }}</td>
                                <td>${{ number_format($donate->net_balance, 2) }}</td>
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
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Comments</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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
                        @forelse ($fundRaiserPost->comments as $comment)
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
    </div>

    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Comments</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fundRaiserPost->fundraiserupdatemessage as $message)
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
