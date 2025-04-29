@extends('Backend.layouts.master')
@section('title')
    Contact
@endsection
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar" style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Contact Us Section</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="contactTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Modal for edit --}}
        <div class="modal fade" id="Edit" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Contact Us </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="up_hotline" class="form-label">Hotline Number</label>
                                    <input type="text" id="up_hotline" class="form-control" name="hotline"
                                        placeholder="Enter here.....">
                                    @error('hotline')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_hotmail" class="form-label">Hot Mail</label>
                                    <input type="email" id="up_hotmail" class="form-control" name="hotmail"
                                        placeholder="Enter here.....">
                                    @error('hotmail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_phone" class="form-label">Phone Number</label>
                                    <input type="text" id="up_phone" class="form-control" name="phone"
                                        placeholder="Enter here.....">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_email" class="form-label">Email</label>
                                    <input type="email" id="up_email" class="form-control" name="email"
                                        placeholder="Enter here.....">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_address" class="form-label">Address</label>
                                    <input type="text" id="up_address" class="form-control" name="address"
                                        placeholder="Enter here.....">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_map_link" class="form-label">Map Link</label>
                                    <input type="text" id="up_map_link" class="form-control" name="map_link"
                                        placeholder="Enter here.....">
                                    @error('map_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <span class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </span>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
@section('footer_script')
    <script>
        $(document).ready(function() {
            var token = $("input[name='_token']").val();
            //  contact list
            let contactTable = $('#contactTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.contact-us.get-data') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // add contact
            $('#createForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.contact-us.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {

                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Contact Us',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {

                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                            });

                            $('#createForm')[0].reset();
                            contactTable.ajax.reload();
                            // window.location.reload();
                        }
                        // Close the modal
                        var myModalEl = document.getElementById('Add');
                        var modal = bootstrap.Modal.getInstance(
                            myModalEl); // Get the modal instance
                        modal.hide(); // Hide the modal
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            //edit contact
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/contact-us/' + id + '/edit',

                    success: function(data) {
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#up_hotmail').val(data.hotmail);
                        $('#updateForm').find('#up_hotline').val(data.hotline);
                        $('#updateForm').find('#up_phone').val(data.phone);
                        $('#updateForm').find('#up_email').val(data.email);
                        $('#updateForm').find('#up_address').val(data.address);
                        $('#updateForm').find('#up_map_link').val(data.map_link);
                        $('#updateForm').find('#up_status').val(data.status);
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            // update contact
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/contact-us') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update Contact Us',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "Contact Us update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            contactTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });


        });
    </script>
@endsection
@endsection
