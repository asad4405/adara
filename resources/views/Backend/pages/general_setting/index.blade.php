@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage General Setting Section</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="generalSettingTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">White Logo</th>
                            <th class="text-center">Dark Logo</th>
                            <th class="text-center">Favicon</th>
                            <th class="text-center">Whatsapp</th>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Genenal Setting </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form" id="updateForm" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="id" id="up_id" hidden>

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="up_name" class="form-label">Name</label>
                                    <input type="text" id="up_name" class="form-control" name="name"
                                        placeholder="Enter here.....">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12" id="whiteLogo">
                                    <label for="white_logo" class="form-label">White Logo</label>
                                    <input type="file" id="" class="form-control" name="white_logo"
                                        placeholder="Enter here.....">
                                    @error('white_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12" id="darkLogo">
                                    <label for="" class="form-label">Dark Logo</label>
                                    <input type="file" id="" class="form-control" name="dark_logo"
                                        placeholder="Enter here.....">
                                    @error('dark_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12" id="favicon">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <input type="file" id="up_favicon" class="form-control" name="favicon"
                                        placeholder="Enter here.....">
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_copyright" class="form-label">Copyright Name</label>
                                    <input type="text" id="up_copyright" class="form-control" name="copyright"
                                        placeholder="Enter here.....">
                                    @error('copyright')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_wp_number" class="form-label">Whatsapp Number</label>
                                    <input type="text" id="up_wp_number" class="form-control" name="wp_number"
                                        placeholder="Enter here.....">
                                    @error('wp_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_messenger" class="form-label">Messenger Link</label>
                                    <input type="text" id="up_messenger" class="form-control" name="messenger"
                                        placeholder="Enter here.....">
                                    @error('messenger')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="up_description" class="form-label">Description</label>
                                    <textarea name="description" id="up_description" rows="6" class="form-control"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
            // general setting list
            let generalSettingTable = $('#generalSettingTable').DataTable({
                order: [
                    [0, 'asc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.generalSetting.get-data') }}",
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'white_logo'
                    },
                    {
                        data: 'dark_logo'
                    },
                    {
                        data: 'favicon'
                    },
                    {
                        data: 'wp_number'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // edit general setting
            $(document).on('click', '#editButton', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '/adara/admin/general/setting/' + id + '/edit',
                    success: function(data) {
                        $('#updateForm').find('#up_id').val(data.id);
                        $('#updateForm').find('#up_name').val(data.name);
                        $('#updateForm').find('#up_wp_number').val(data.wp_number);
                        $('#updateForm').find('#up_messenger').val(data.messenger);
                        $('#updateForm').find('#up_copyright').val(data.copyright);
                        $('#updateForm').find('#up_description').val(data.white_logo);
                        $('#whiteLogo').find('img').remove();
                        $('#whiteLogo').append(`
                        <img src={{ asset('`+ data.white_logo +`') }} alt="" style="width: 75px;">
                    `);
                        $('#darkLogo').find('img').remove();
                        $('#darkLogo').append(`
                        <img src={{ asset('`+ data.dark_logo +`') }} alt="" style="width: 75px;">
                    `);
                            $('#favicon').find('img').remove();
                            $('#favicon').append(`
                        <img src={{ asset('`+ data.favicon +`') }} alt="" style="width: 75px;">
                    `);
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            // update size
            $('#updateForm').submit(function(e) {
                e.preventDefault();

                let id = $('#up_id').val();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/general/setting') }}/" + id,
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        if (data == 'error') {
                            console.log('error');
                            Swal.fire({
                                icon: 'error',
                                title: 'Can not update General Setting',
                                text: 'Please fill Title Name',
                                buttons: true,
                                buttons: "Thanks",
                            });
                        } else {
                            Swal.fire({
                                title: "General Setting update successfully !",
                                icon: "success",
                            });
                            var myModalEl = document.getElementById('Edit');
                            var modal = bootstrap.Modal.getInstance(
                                myModalEl); // Get the modal instance
                            modal.hide(); // Hide the modal
                            generalSettingTable.ajax.reload();

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
