<x-admin.layout>
    <x-slot name="title">Locations</x-slot>
    <x-slot name="heading">Locations</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Location</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_name">Location Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_name" name="location_name" type="text" placeholder="Enter Location Name">
                                    <span class="text-danger is-invalid location_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_area">Location Area <span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_area" name="location_area" type="text" placeholder="Enter Location Area">
                                    <span class="text-danger is-invalid location_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark <span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pincode">PinCode <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="number" placeholder="Enter Pincode">
                                    <span class="text-danger is-invalid pincode_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="latitude">Latitude <span class="text-danger">*</span></label>
                                    <input class="form-control" id="latitude" name="latitude" type="text" placeholder="Enter Latitude">
                                    <span class="text-danger is-invalid latitude_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="longitude">Longitude <span class="text-danger">*</span></label>
                                    <input class="form-control" id="longitude" name="longitude" type="text" placeholder="Enter Longitude">
                                    <span class="text-danger is-invalid longitude_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="" selected>-- Select Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Location</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_name">Location Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_name" name="location_name" type="text" placeholder="Enter Location Name">
                                    <span class="text-danger is-invalid location_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location_area">Location Area <span class="text-danger">*</span></label>
                                    <input class="form-control" id="location_area" name="location_area" type="text" placeholder="Enter Location Area">
                                    <span class="text-danger is-invalid location_area_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="landmark">Landmark <span class="text-danger">*</span></label>
                                    <input class="form-control" id="landmark" name="landmark" type="text" placeholder="Enter Landmark">
                                    <span class="text-danger is-invalid landmark_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pincode">PinCode <span class="text-danger">*</span></label>
                                    <input class="form-control" id="pincode" name="pincode" type="number" placeholder="Enter Pincode">
                                    <span class="text-danger is-invalid pincode_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="latitude">Latitude <span class="text-danger">*</span></label>
                                    <input class="form-control" id="latitude" name="latitude" type="text" placeholder="Enter Latitude">
                                    <span class="text-danger is-invalid latitude_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="longitude">Longitude <span class="text-danger">*</span></label>
                                    <input class="form-control" id="longitude" name="longitude" type="text" placeholder="Enter Longitude">
                                    <span class="text-danger is-invalid longitude_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="" disabled selected>-- Select Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid title_err"></span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Location Name</th>
                                        <th>Location Area</th>
                                        <th>LandMark</th>
                                        <th>PinCode</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locationList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->location_name }}</td>
                                            <td>{{ $list->location_area }}</td>
                                            <td>{{ $list->landmark }}</td>
                                            <td>{{ $list->pincode }}</td>
                                            <td>{{ $list->latitude }}</td>
                                            <td>{{ $list->longitude }}</td>
                                            <td>
                                                @if($list->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Scheme" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Scheme" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('locations.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('locations.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('locations.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.location.id);
                    $("#editForm input[name='location_name']").val(data.location.location_name);
                    $("#editForm input[name='location_area']").val(data.location.location_area);
                    $("#editForm input[name='landmark']").val(data.location.landmark);
                    $("#editForm input[name='pincode']").val(data.location.pincode);
                    $("#editForm input[name='latitude']").val(data.location.latitude);
                    $("#editForm input[name='longitude']").val(data.location.longitude);
                    $("#editForm select[name='status']").val(data.location.status);
                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('locations.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('locations.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this location?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('locations.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
