@extends('layouts.clientapp')
@section('title', 'Comments')

@section('content')
    <div>
        <div class="account_content_area">
            <h3>Comments</h3>
            <div class="account_content_area_form table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse  ($comments as $key=>$comment)
                            <tr style="background: rgba(230, 229, 229, 0.7)">
                                <td>{{ ++$key }}</td>
                                <td width="50%">
                                    {{ $comment->comment }}
                                </td>
                                <td>{{ $comment->created_at->format('M d, Y') }}</td>
                                <td><span
                                        class="badge  {{ $comment->status === 'approved' ? 'bg-success' : 'bg-warning' }}">{{ $comment->status }}</span>
                                </td>
                                <td align="right">
                                    <a href="#" data-id="{{ $comment->id }}"
                                        data-title=" {{ Str::limit($comment->comment, 20, '...') }}"
                                        data-postid="{{ $comment->fundraiser_post_id }}" class="action_icon replay_btn"
                                        title="Reply" data-bs-toggle="modal" data-bs-target="#replayModal">
                                        <i class="fas fa-reply"></i>
                                    </a>
                                    <a href="{{ route('fundraiser.comment.status.update', $comment->id) }}"
                                        class="action_icon"
                                        title="{{ $comment->status === 'approved' ? 'Unapproved' : 'Approved' }}">
                                        <i
                                            class="far {{ $comment->status === 'approved' ? 'fa-circle-xmark' : 'fa-square-check' }}"></i>

                                    </a>
                                    {{-- <a href="" class="action_icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                                    <form action="{{ route('fundraiser.comment.delete', $comment->id) }}" method="POST"
                                        class="d-inline" style="cursor: pointer">
                                        @csrf
                                        @method('DELETE')
                                        <p class="action_icon delete post_delete" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </p>
                                    </form>
                                </td>
                            </tr>
                            @foreach ($comment->replies as $key => $comment)
                                <tr>
                                    <td> </td>
                                    <td width="50%">
                                        {{ $comment->comment }}
                                    </td>
                                    <td>{{ $comment->created_at->format('M d, Y') }}</td>
                                    <td><span
                                            class="badge  {{ $comment->status === 'approved' ? 'bg-success' : 'bg-warning' }}">{{ $comment->status }}</span>
                                    </td>
                                    <td align="right">

                                        <a href="{{ route('fundraiser.comment.status.update', $comment->id) }}"
                                            class="action_icon"
                                            title="{{ $comment->status === 'approved' ? 'Unapproved' : 'Approved' }}">
                                            <i
                                                class="far {{ $comment->status === 'approved' ? 'fa-circle-xmark' : 'fa-square-check' }}"></i>

                                        </a>
                                        {{-- <a href="" class="action_icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                                        <form action="{{ route('fundraiser.comment.delete', $comment->id) }}"
                                            method="POST" class="d-inline" style="cursor: pointer">
                                            @csrf
                                            @method('DELETE')
                                            <p class="action_icon delete post_delete" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </p>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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

    <!-- Modal -->
    <div class="modal fade" id="replayModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="replayTitle">Reply</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('fundraiser.comment.replay') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="replay_id" value="">
                        <textarea name="replay" id="" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(function($) {

            $('.replay_btn').on('click', function() {
                let id = $(this).data("id");
                let title = $(this).data("title");
                $('#replayModal').find('#replay_id').val(id);
                $('#replayModal').find('#replayTitle').html(title);
            });

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
