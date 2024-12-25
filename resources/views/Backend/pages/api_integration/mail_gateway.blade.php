@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Mail Gateway Section</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.mail-gateway.update', $mail_getway->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="id" id="up_id" hidden>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mail Mailer</label>
                            <input type="text" class="form-control" name="mail_mailer"
                                value="{{ $mail_getway->mail_mailer }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_host</label>
                            <input type="text" class="form-control" name="mail_host"
                                value="{{ $mail_getway->mail_host }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_port</label>
                            <input type="text" class="form-control" name="mail_port"
                                value="{{ $mail_getway->mail_port }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_username</label>
                            <input type="text" class="form-control" name="mail_username"
                                value="{{ $mail_getway->mail_username }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_password</label>
                            <input type="text" class="form-control" name="mail_password"
                                value="{{ $mail_getway->mail_password }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_encryption</label>
                            <input type="text" class="form-control" name="mail_encryption"
                                value="{{ $mail_getway->mail_encryption }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->status == 1) checked @endif
                                    name="status">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="order" class="d-block">Order Confirm</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->order == 1) checked @endif
                                    name="order">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="forgot_pass" class="d-block">Forgot Password</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->forgot_pass == 1) checked @endif
                                    name="forgot_pass">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="password_g" class="d-block">Password Generator</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->password_g == 1) checked @endif
                                    name="password_g">
                                <span class="toggle-slider"></span>
                            </label>
                            {{-- <div class="form-group">
                            <label for="status" class="d-block">Status</label>
                            <label class="switch">
                                <input type="checkbox" value="1" @if ($sms->status == 1) checked @endif
                                    name="status" />
                                <span class="slider round"></span>
                            </label>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
@section('footer_script')
    {{-- <script>
        $(document).ready(function() {
            var token = $("input[name='_token']").val();
            //edit mail getway
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '/adara/admin/mail/gateway/' + id + '/edit',

                success: function(data) {
                    $('#updateForm').find('#up_id').val(data.id);
                    $('#updateForm').find('#mail_mailer').val(data.mail_mailer);
                    $('#updateForm').find('#status').val(data.status);
                },
                error: function(error) {
                    console.log('error');
                }

            });

            // update banner category
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/banner/category') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update Banner Category',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "Banner Category update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            bannerCategoryTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // status update
            $(document).on('click', '#statusButton', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                $.ajax({
                    type: 'GET',
                    url: '/adara/admin/banner/category/status/' + id,
                    data: {
                        id: id,
                        status: status,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        bannerCategoryTable.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });


        });
    </script> --}}
@endsection
@endsection
