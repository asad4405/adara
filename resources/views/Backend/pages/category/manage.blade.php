@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Category Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Category</button>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="categoryTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Front View</th>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Add Category Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="createForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" id="category_name" class="form-control" name="category_name"
                                        placeholder="Enter here.....">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="image" class="form-label">Category Image</label>
                                    <input type="file" id="image" class="form-control" name="image"
                                        placeholder="Enter here.....">
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

                                {{-- <div class="mb-3 col-12">
                                    <label for="status" class="form-label d-block">Status</label>
                                    <label class="custom-toggle">
                                        <input type="checkbox" value="1" name="status" id="status">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div> --}}

                                <div class="mb-3 col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="front_view" class="form-label">Front View</label>
                                    <select name="front_view" id="front_view" class="form-select">
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Subcategory </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" id="category_name" class="form-control" name="category_name"
                                        placeholder="Enter here.....">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12" id="showImage">
                                    <label for="image" class="form-label">Category Image</label>
                                    <input type="file" id="image" class="form-control" name="image"
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
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="6"></textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_status" class="form-label">Status</label>
                                    <select name="status" id="up_status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3 col-12">
                                    <label for="up_status" class="form-label d-block">Status</label>
                                    <label class="custom-toggle">
                                        <input type="checkbox" value="1" name="status" id="up_status">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div> --}}

                                <div class="mb-3 col-12">
                                    <label for="front_view" class="form-label">Front View</label>
                                    <select name="front_view" id="front_view" class="form-select">
                                        <option value="1">Show</option>
                                        <option value="0">Hide</option>
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

    </div>
@section('footer_script')
    <script>
        $(document).ready(function() {
            // category list
            let categoryTable = $('#categoryTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('category.get-data') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'category_name'
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'front_view'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // add category //
            $('#createForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('category.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {

                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Category',
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
                            categoryTable.ajax.reload();
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

            //edit category
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/category/edit/' + id,

                    success: function(data) {
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#category_name').val(data.category_name);
                        $('#updateForm').find('#meta_title').val(data.meta_title);
                        $('#updateForm').find('#meta_description').html(data.meta_description);
                        $('#updateForm').find('#up_status').val(data.status);
                        $('#updateForm').find('#front_view').val(data.front_view);
                        if(data.status == 1){
                            $('#up_status').attr('checked',true)
                        }
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

            //update category
            $('#updateForm').submit(function(e) {
                e.preventDefault();
                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ request()->root() }}/admin/category/update/' + id,
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
                                title: "Category update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            categoryTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            //delete category
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
                            type: 'GET',
                            url: '{{ request()->root() }}/admin/category/delete/' + id,
                            success: function(data) {
                                Swal.fire("Category has been deleted!", {
                                    icon: "success",
                                });
                                categoryTable.ajax.reload();
                            },
                            error: function(error) {
                                console.log('error');
                            }

                        });
                    }
                });

            });

            //status update
            $(document).on('click', '#statusButton', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/category/status/' + id,
                    data: {
                        id: id,
                        status: status,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        categoryTable.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            //front view update
            $(document).on('click', '#frontViewButton', function() {
                let id = $(this).data('id');
                let front_view = $(this).data('front_view');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/category/front/view/' + id,
                    data: {
                        id: id,
                        front_view: front_view,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Front View updated !",
                            icon: "success",
                        });
                        categoryTable.ajax.reload();
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
