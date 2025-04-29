@extends('Backend.layouts.master')
@section('title')
    Coupon
@endsection
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Coupon Section</h5>
            <button type="button" class="text-right btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add
                Coupon</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="couponTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Coupon Name</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Validity</th>
                            <th class="text-center">Limit</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal for add --}}
        <div class="modal fade" id="Add" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Add Coupon Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="createForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="coupon_name" class="form-label">Coupon Name</label>
                                    <input type="text" id="coupon_name" class="form-control" name="coupon_name"
                                        placeholder="Enter here.....">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="">Select Type</option>
                                        <option value="1">Percentage</option>
                                        <option value="2">Solid Amount</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" id="amount" class="form-control" name="amount"
                                        placeholder="Enter here.....">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="validity" class="form-label">Validity</label>
                                    <input type="date" id="validity" class="form-control" name="validity"
                                        placeholder="Enter here.....">
                                    @error('validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="limit" class="form-label">Limit</label>
                                    <input type="text" id="limit" class="form-control" name="limit"
                                        placeholder="Enter here.....">
                                    @error('limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="status" class="form-label d-block">Status</label>
                                    <label class="custom-toggle">
                                        <input type="checkbox" value="1" checked  name="status">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div class="modal-footer">
                                    <span class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </span>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal for edit --}}
        <div class="modal fade" id="Edit" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Coupon </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="up_coupon_name" class="form-label">Coupon Name</label>
                                    <input type="text" id="up_coupon_name" class="form-control" name="coupon_name"
                                        placeholder="Enter here.....">
                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_type" class="form-label">Type</label>
                                    <select name="type" id="up_type" class="form-select">
                                        <option value="">Select Type</option>
                                        <option value="1">Percentage</option>
                                        <option value="2">Solid Amount</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_amount" class="form-label">Amount</label>
                                    <input type="text" id="up_amount" class="form-control" name="amount"
                                        placeholder="Enter here.....">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_validity" class="form-label">Validity</label>
                                    <input type="date" id="up_validity" class="form-control" name="validity"
                                        placeholder="Enter here.....">
                                    @error('validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_limit" class="form-label">Limit</label>
                                    <input type="text" id="up_limit" class="form-control" name="limit"
                                        placeholder="Enter here.....">
                                    @error('limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_status" class="form-label d-block">Status</label>
                                    <label class="custom-toggle">
                                        <input type="checkbox" value="1" name="status" id="up_status">
                                        <span class="toggle-slider"></span>
                                    </label>
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
            // coupon list
            let couponTable = $('#couponTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.coupon.get-data') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'coupon_name'
                    },
                    {
                        data: 'amount'
                    },
                    {
                        data: 'validity'
                    },
                    {
                        data: 'limit'
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

            // add coupon
            $('#createForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.coupon.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {

                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Coupon',
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
                            couponTable.ajax.reload();
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

            //edit coupon
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/coupon/' + id + '/edit',

                    success: function(data) {
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#up_coupon_name').val(data.coupon_name);
                        $('#updateForm').find('#up_type').val(data.type);
                        $('#updateForm').find('#up_amount').val(data.amount);
                        $('#updateForm').find('#up_validity').val(data.validity);
                        $('#updateForm').find('#up_limit').val(data.limit);
                        $('#updateForm').find('#up_status').val(data.status);
                        if(data.status == 1){
                            $('#up_status').attr('checked',true)
                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            // update coupon
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/coupon') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update Coupon',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "Coupon update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            couponTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // coupon delete
            $(document).on('click', '#deleteButton', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: '{{ request()->root() }}/admin/coupon/' + id,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                Swal.fire("Coupon has been deleted!", {
                                    icon: "success",
                                });
                                couponTable.ajax.reload();
                            },
                            error: function(error) {
                                console.log('error');
                            }

                        });
                    }
                });

            });

            // status update
            $(document).on('click', '#statusButton', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/coupon/status/' + id,
                    data: {
                        id: id,
                        status: status,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        couponTable.ajax.reload();
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
