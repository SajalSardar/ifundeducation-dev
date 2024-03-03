@extends('layouts.clientapp')
@section('title', 'Wishlists')

@section('content')
    <div>
        <div class="account_content_area">
            <h3>Saved Fundraisers</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Fundraiser Title</th>
                            <th>Date</th>
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
                                <td>{{ $wishlist->created_at->format('M d, Y') }}</td>
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
