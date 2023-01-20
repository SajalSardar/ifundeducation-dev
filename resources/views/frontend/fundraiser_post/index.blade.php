@extends('layouts.frontapp')
@section('title', 'Funding Posts')

@section('content')
    <!-- breadcrumb  -->
    <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">Funding Posts</li>
        </ol>
    </x-breadcrumb>
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>My Funding Posts</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Target</th>
                                        <th>End Date</th>
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
                                                <a href="{{ route('front.fundraiser.post.show', $post->slug) }}"
                                                    class="action_icon" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('fundraiser.post.edit', $post->id) }}" class="action_icon"
                                                    title="Edit">
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
            $('.post_delete').on('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
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
