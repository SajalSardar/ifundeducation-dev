@extends('layouts.clientapp')
@section('title', 'Fundraiser Update Message')
@section('content')
    <div class="col-lg-9 col-md-8">
        <div class="account_content_area">
            <h3>Fundraiser Message <button class="btn btn-sm btn-success float-end" data-bs-toggle="modal"
                    data-bs-target="#post_update_message">Create
                    Message + </button></h3>


            <div class="accordion">
                @foreach ($messages as $key => $message)
                    <div class="accordion-item mt-4">
                        <div class="accordion-header">
                            <h4 class="accordion-button text-black" data-bs-toggle="collapse"
                                data-bs-target="#{{ Str::slug($key) }}">
                                {{ $key }}
                            </h4>
                        </div>
                        <div id="{{ Str::slug($key) }}"
                            class="accordion-collapse collapse {{ $messages->first() ? 'show' : '' }}">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Message</th>
                                            <th>Type</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($message as $mess)
                                            <tr>
                                                <td>{{ Str::limit($mess->message, 50, '...') }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $mess->message_type == 'success' ? ' bg-success' : ($mess->message_type == 'warning' ? ' bg-warning' : 'bg-danger') }}">{{ $mess->message_type }}</span>
                                                </td>
                                                <td>{{ $mess->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('fundraiser.post.message.edit', $mess->id) }}"
                                                        class="action_icon" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('fundraiser.post.message.delete', $mess->id) }}"
                                                        method="POST" class="d-inline" style="cursor: pointer">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p class="action_icon delete message_delete" title="Delete">
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
                @endforeach

            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="post_update_message" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Create Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="account_content_area_form" id="update_message_post_form">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label d-block">Fundraising Post:<span
                                        class="text-danger">*</span></label>
                                <select name="fundraiser_post" id="fundraiser_post"
                                    class="form-control @error('fundraiser_post') is-invalid @enderror">
                                    <option disabled selected>Select Post</option>
                                    @foreach ($posts as $post)
                                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger" id="fundraiser_postErrorMsg"></p>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label d-block">Message Type:<span class="text-danger">*</span></label>
                                <select name="message_type" id="message_type"
                                    class="form-control  @error('message_type') is-invalid @enderror">
                                    <option disabled selected>Select type</option>
                                    <option value="success">Success</option>
                                    <option value="warning">Warning</option>
                                    <option value="danger">Danger</option>
                                </select>
                                <p class="text-danger" id="message_typeErrorMsg"></p>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="update_message" class="form-label">Message :<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('update_message') is-invalid @enderror" id="update_message" name="update_message"
                                    rows="5">{{ old('update_message') }}</textarea>
                                <p style="color: rgba(54, 76, 102, 0.7)">Maximum 150 Character.
                                </p>
                                <p class="text-danger" id="update_messageErrorMsg"></p>
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
@endsection

@section('script')
    <script>
        $('#update_message_post_form').on('submit', function(e) {
            e.preventDefault();

            let fundraiser_post = $('#fundraiser_post').val();
            let message_type = $('#message_type').val();
            let update_message = $('#update_message').val();


            $.ajax({
                url: "{{ route('fundraiser.post.message.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    fundraiser_post: fundraiser_post,
                    message_type: message_type,
                    update_message: update_message,
                },
                success: function(response) {
                    if (response.success) {
                        $('#post_update_message').modal('hide');
                        document.location.href = "{{ route('fundraiser.post.message.index') }}";
                    }

                },
                error: function(response) {
                    $('#fundraiser_postErrorMsg').text(response.responseJSON.errors.fundraiser_post);
                    $('#message_typeErrorMsg').text(response.responseJSON.errors.message_type);
                    $('#update_messageErrorMsg').text(response.responseJSON.errors.update_message);
                },
            });
        });


        $(function($) {
            $('.message_delete').on('click', function() {
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
