@extends('layouts.clientapp')
@section('title', 'Wishlists')

@section('content')
    <!-- breadcrumb  -->
    {{-- <x-breadcrumb>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ config('app.name') }}</a></li>
            <li class="breadcrumb-item active">Wishlists</li>
        </ol>
    </x-breadcrumb> --}}
    <!-- breadcrumb end  -->

    <section class="account_section">
        <div class="container-fluid ps-0">
            <div class="row">
                @include('frontend.dashboard.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="account_content_area">
                        <h3>Wishlists</h3>
                        <div class="account_content_area_form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $key => $wishlist)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                @if ($wishlist->fundraiser_post->image)
                                                    <img src="{{ asset('storage/fundraiser_post/' . $wishlist->fundraiser_post->image) }}"
                                                        alt="{{ $wishlist->fundraiser_post->title }}" width="80">
                                                @else
                                                    <img src="{{ Avatar::create($wishlist->fundraiser_post->title)->setShape('square')->setBackground('#ddd')->setDimension(80)->setFontSize(14)->toBase64() }}"
                                                        alt="{{ $wishlist->fundraiser_post->title }}">
                                                @endif
                                            </td>
                                            <td>{{ $wishlist->fundraiser_post->title }}</td>
                                            <td>
                                                <a href="{{ route('front.fundraiser.post.show', $wishlist->fundraiser_post->slug) }}"
                                                    class="action_icon" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST"
                                                    class="d-inline" style="cursor: pointer">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p class="action_icon delete post_delete" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </p>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

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
