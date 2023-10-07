@extends('layouts.frontapp')
@section('title', 'Funding Posts')

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">Funding Campaign</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>My Funding Campaign</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Target</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse  ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ Str::limit($post->title, 20, '...') }}</td>
                                            <td>
                                                @foreach ($post->fundraisercategories as $categoty)
                                                    <span class="badge bg-success">{{ $categoty->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $post->goal }}</td>
                                            <td>{{ $post->end_date->isoFormat('D MMM YYYY') }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $post->status == 'running' ? 'success' : ($post->status == 'pending' ? 'warning' : 'danger') }}">{{ Str::ucfirst($post->status) }}</span>
                                            </td>
                                            <td>

                                                @if ($post->status == 'stop')
                                                    <a href="{{ route('fundraiser.post.running', $post->id) }}"
                                                        title="Running Campaign" class="action_icon running_campaign">
                                                        <i class="fa-regular fa-circle-play"></i></a>
                                                @else
                                                    <a href="{{ route('fundraiser.post.stop', $post->id) }}"
                                                        title="Stop Campaign" class="action_icon stop_campaign"> <i
                                                            class="fa-regular fa-circle-stop"></i></a>
                                                @endif

                                                <a href="{{ route('fundraiser.post.show', $post->id) }}"
                                                    class="action_icon" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('fundraiser.post.edit', $post->id) }}"
                                                    class="action_icon" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('fundraiser.post.delete', $post->id) }}"
                                                    method="POST" class="d-inline" style="cursor: pointer">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p class="action_icon delete post_delete" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </p>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <p>No Post Found!</p>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function($) {
            $('.running_campaign').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Runn this Campaign!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Running It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            })
            $('.stop_campaign').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    text: "Stope this Campaign!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Stop It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            })

            $('.post_delete').on('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent('form').submit();
                    }
                });
            })
        });
    </script>

@endsection
