@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title">
            <h5>Manage Subcategory Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Subategory</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="subcategoryTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Subcategory Name</th>
                            <th class="text-center">Image</th>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Add Subcategory Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="createForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="category_id" class="form-label">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="category_name" class="form-label">Subcategory Name</label>
                                    <input type="text" id="subategory_name" class="form-control" name="subcategory_name"
                                        placeholder="Enter here.....">
                                    @error('subcategory_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="image" class="form-label">Subategory Image</label>
                                    <input type="file" id="" class="form-control" name="image"
                                        placeholder="Enter here.....">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" id="meta_title" class="form-control" name="meta_title"
                                        placeholder="Enter here.....">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea name="meta_description" id="" class="form-control" rows="6"></textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Category </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="category_id" class="form-label">Category Name</label>
                                    <select name="category_id" id="up_category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="category_name" class="form-label">Subcategory Name</label>
                                    <input type="text" id="up_subcategory_name" class="form-control"
                                        name="subcategory_name" placeholder="Enter here.....">
                                    @error('subcategory_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12" id="showImage">
                                    <label for="image" class="form-label">Subategory Image</label>
                                    <input type="file" id="" class="form-control" name="image"
                                        placeholder="Enter here.....">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" id="up_meta_title" class="form-control" name="meta_title"
                                        placeholder="Enter here.....">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea id="up_meta_description" name="meta_description" id="" class="form-control" rows="6"></textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="up_status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
@section('footer_script')
    <script>
        $(document).ready(function() {
            var token = $("input[name='_token']").val();
            // subcategory list
            let subcategoryTable = $('#subcategoryTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.subcategory.get-data') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'category_name'
                    },
                    {
                        data: 'subcategory_name'
                    },
                    {
                        data: 'image',
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

            // add subcategory
            $('#createForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.subcategory.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {

                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Subcategory',
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
                            subcategoryTable.ajax.reload();
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

            //edit service
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '/adara/admin/subcategory/' + id + '/edit',

                    success: function(data) {
                        $('#updateForm').find('#up_category_id').val(data.category_id);
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#up_subcategory_name').val(data
                        .subcategory_name);
                        $('#updateForm').find('#up_meta_title').val(data.meta_title);
                        $('#updateForm').find('#up_meta_description').val(data.meta_description);
                        $('#updateForm').find('#up_status').val(data.status);
                        $('#showImage').find('img').remove();
                        $('#showImage').append(`
                        <img src={{ asset('`+ data.image +`') }} alt="" style="width: 75px;">
                    `);
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            // update subcategory
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/subcategory') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update Category',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "Subcategory update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            subcategoryTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // subcategory delete
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
                            url: 'subcategory/' + id,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                Swal.fire("Subcategory has been deleted!", {
                                    icon: "success",
                                });
                                subcategoryTable.ajax.reload();
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
                    url: 'subcategory/status/' + id,
                    data: {
                        id: id,
                        status: status,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        subcategoryTable.ajax.reload();
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
