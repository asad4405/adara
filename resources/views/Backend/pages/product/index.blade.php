@extends('Backend.layouts.master')
@section('title')
    Product
@endsection
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Product Section</h5>
            <button type="button" class="text-right btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add
                Product</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="productTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Product</th>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Add Product Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="createForm" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="product_name" class="form-label">Product Name *</label>
                                    <input type="text" id="product_name" class="form-control" name="product_name"
                                        placeholder="Enter here.....">
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="category_id" class="form-label">Category Name *</label>
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

                                <div class="mb-3 col-6">
                                    <label for="subcategory_id" class="form-label">Subcategory Name (optional)</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-select">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="childcategory_id" class="form-label">Childcategory Name (optional)</label>
                                    <select name="childcategory_id" id="childcategory_id" class="form-select">
                                        <option value="">Select Childcategory</option>
                                        @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->id }}">
                                                {{ $childcategory->childcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="brand_id" class="form-label">Brand Name (optional)</label>
                                    <select name="brand_id" id="brand_id" class="form-select">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="product_code" class="form-label">Product Code *</label>
                                    <input type="text" id="product_code" class="form-control" name="product_code"
                                        placeholder="Enter here.....">
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="purchase_price" class="form-label">Purchase Price *</label>
                                    <input type="text" id="purchase_price" class="form-control" name="purchase_price"
                                        placeholder="Enter here.....">
                                    @error('purchase_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="old_price" class="form-label">Old Price *</label>
                                    <input type="text" id="old_price" class="form-control" name="old_price"
                                        placeholder="Enter here.....">
                                    @error('old_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="new_price" class="form-label">New Price *</label>
                                    <input type="text" id="new_price" class="form-control" name="new_price"
                                        placeholder="Enter here.....">
                                    @error('new_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="stock" class="form-label">Stock *</label>
                                    <input type="text" id="stock" class="form-control" name="stock"
                                        placeholder="Enter here.....">
                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="product_image" class="form-label">Product Image *</label>
                                    <input type="file" id="product_image" class="form-control" name="product_image"
                                        placeholder="Enter here.....">
                                    @error('product_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="slider_image" class="form-label">Slider Image *</label>
                                    <input type="file" id="slider_image" class="form-control" name="slider_image[]"
                                        placeholder="Enter here....." multiple>
                                    @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="product_type" class="form-label">Product Type *</label>
                                    <select name="product_type" class="form-select" id="product_type">
                                        <option value="0">Single</option>
                                        <option value="1">Varient</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="product_video" class="form-label">Product Video (optional)</label>
                                    <input type="text" id="product_video" class="form-control" name="product_video"
                                        placeholder="Enter here.....">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea name="short_description" id="short_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="status" class="d-block">Status</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" checked name="status">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="hot_product" class="d-block">Hot Product</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" name="hot_product">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="feature_product" class="d-block">Feature Product</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" name="feature_product">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="best_selling" class="d-block">Best Selling </label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" name="best_selling">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Product </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="id" id="up_id" hidden>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="up_product_name" class="form-label">Product Name *</label>
                                    <input type="text" id="up_product_name" class="form-control" name="product_name"
                                        placeholder="Enter here.....">
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_category_id" class="form-label">Category Name *</label>
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

                                <div class="mb-3 col-6">
                                    <label for="up_subcategory_id" class="form-label">Subcategory Name (optional)</label>
                                    <select name="subcategory_id" id="up_subcategory_id" class="form-select">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_childcategory_id" class="form-label">Childcategory Name
                                        (optional)</label>
                                    <select name="childcategory_id" id="up_childcategory_id" class="form-select">
                                        <option value="">Select Childcategory</option>
                                        @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->id }}">
                                                {{ $childcategory->childcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_brand_id" class="form-label">Brand Name (optional)</label>
                                    <select name="brand_id" id="up_brand_id" class="form-select">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="product_type" class="form-label">Product Type *</label>
                                    <select name="product_type" class="form-select" id="up_product_type">
                                        <option value="0">Single</option>
                                        <option value="1">Varient</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_product_code" class="form-label">Product Code *</label>
                                    <input type="text" id="up_product_code" class="form-control" name="product_code"
                                        placeholder="Enter here.....">
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_purchase_price" class="form-label">Purchase Price *</label>
                                    <input type="text" id="up_purchase_price" class="form-control"
                                        name="purchase_price" placeholder="Enter here.....">
                                    @error('purchase_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_old_price" class="form-label">Old Price *</label>
                                    <input type="text" id="up_old_price" class="form-control" name="old_price"
                                        placeholder="Enter here.....">
                                    @error('old_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_new_price" class="form-label">New Price *</label>
                                    <input type="text" id="up_new_price" class="form-control" name="new_price"
                                        placeholder="Enter here.....">
                                    @error('new_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_stock" class="form-label">Stock *</label>
                                    <input type="text" id="up_stock" class="form-control" name="stock"
                                        placeholder="Enter here.....">
                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3 col-6">
                                    <label for="up_product_image" class="form-label">Product Image *</label>
                                    <input type="file" id="up_product_image" class="form-control" name="product_image"
                                        placeholder="Enter here.....">
                                    @error('product_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_slider_image" class="form-label">Slider Image *</label>
                                    <input type="file" id="up_slider_image" class="form-control"
                                        name="slider_image[]" placeholder="Enter here....." multiple>
                                    @error('slider_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="mb-3 col-6">
                                    <label for="up_color_id" class="form-label">Color (optional)</label>
                                    <select name="color_id" id="up_color_id" class="form-select">
                                        <option value="">Select Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="up_size_id" class="form-label">Size (optional)</label>
                                    <select name="size_id" id="up_size_id" class="form-select">
                                        <option value="">Select Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                {{-- <div class="mb-3 col-6">
                                    <label for="up_product_unit" class="form-label">Product Unit (optional)</label>
                                    <input type="text" id="up_product_unit" class="form-control" name="product_unit"
                                        placeholder="Enter here.....">
                                </div> --}}


                                <div class="mb-3 col-6">
                                    <label for="up_product_video" class="form-label">Product Video (optional)</label>
                                    <input type="text" id="up_product_video" class="form-control"
                                        name="product_video" placeholder="Enter here.....">
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_short_description" class="form-label">Short Description</label>
                                    <textarea name="short_description" id="up_short_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_description" class="form-label">Description *</label>
                                    <textarea name="description" id="up_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="up_status" class="d-block">Status</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" id="up_status" checked name="status">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="up_hot_product" class="d-block">Hot Product</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" id="up_hot_product"
                                                name="hot_product">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="up_feature_product" class="d-block">Feature Product</label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" id="up_feature_product"
                                                name="feature_product">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="up_best_selling" class="d-block">Best Selling </label>
                                        <label class="custom-toggle">
                                            <input type="checkbox" value="1" id="up_best_selling"
                                                name="best_selling">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
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
            $('#description').summernote({});
        });
        $(document).ready(function() {
            $('#up_description').summernote({});
        });
    </script>
    <script>
        $(document).ready(function() {
            var token = $("input[name='_token']").val();
            // product list
            let productTable = $('#productTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.get-data') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'product_name'
                    },
                    {
                        data: 'product_image',
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

            // add product
            $('#createForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.product.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {

                        if (data == 'error') {
                            swal({
                                icon: 'error',
                                title: 'Can not save Product',
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
                            productTable.ajax.reload();
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

            //edit product
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '{{ request()->root() }}/admin/product/' + id + '/edit',

                    success: function(data) {
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#up_product_name').val(data.product_name);
                        $('#updateForm').find('#up_category_id').val(data.category_id);
                        $('#updateForm').find('#up_subcategory_id').val(data.subcategory_id);
                        $('#updateForm').find('#up_childcategory_name').val(data
                            .childcategory_name);
                        $('#updateForm').find('#up_brand_id').val(data.brand_id);
                        $('#updateForm').find('#up_product_code').val(data.product_code);
                        $('#updateForm').find('#up_purchase_price').val(data.purchase_price);
                        $('#updateForm').find('#up_old_price').val(data.old_price);
                        $('#updateForm').find('#up_new_price').val(data.new_price);
                        $('#updateForm').find('#up_stock').val(data.stock);
                        $('#updateForm').find('#up_color_id').val(data.color_id);
                        $('#updateForm').find('#up_size_id').val(data.size_id);
                        // $('#updateForm').find('#up_product_unit').val(data.product_unit);
                        $('#updateForm').find('#up_product_type').val(data.product_type);
                        $('#updateForm').find('#up_product_video').val(data.product_video);
                        $('#updateForm').find('#up_short_description').val(data.short_description);
                        $('#updateForm').find('#up_description').val(data.description);
                        $('#updateForm').find('#up_hot_product').val(data.hot_product);
                        $('#updateForm').find('#up_new_product').val(data.new_product);
                        $('#updateForm').find('#up_feature_product').val(data.feature_product);
                        $('#updateForm').find('#up_best_selling').val(data.best_selling);
                        $('#updateForm').find('#up_status').val(data.status);
                        if (data.hot_product == 1) {
                            $('#up_hot_product').attr('checked', true)
                        }
                        if (data.new_product == 1) {
                            $('#up_new_product').attr('checked', true)
                        }
                        if (data.feature_product == 1) {
                            $('#up_feature_product').attr('checked', true)
                        }
                        if (data.best_selling == 1) {
                            $('#up_best_selling').attr('checked', true)
                        }
                        if (data.status == 1) {
                            $('#up_status').attr('checked', true)
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

            // update product
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/product') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update Product',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "Product update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            productTable.ajax.reload();

                        }
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // product delete
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
                            url: 'product/' + id,
                            data: {
                                '_token': token
                            },
                            success: function(data) {
                                Swal.fire("Product has been deleted!", {
                                    icon: "success",
                                });
                                productTable.ajax.reload();
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
                    url: 'product/status/' + id,
                    data: {
                        id: id,
                        status: status,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        productTable.ajax.reload();
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
