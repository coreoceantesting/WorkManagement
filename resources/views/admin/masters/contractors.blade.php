<x-admin.layout>
    <x-slot name="title">Contractors</x-slot>
    <x-slot name="heading">Contractors</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Contractors</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name">
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label  class="col-form-label" for="contractor_type">Contractor Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="contractor_type" id="contractor_type">
                                        <option value="">Select Contractor Type</option>
                                        @foreach ($contractorTypeList as $list)
                                            <option value="{{ $list->id }}">{{ $list->contractor_type_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid contractor_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name">
                                    <span class="text-danger is-invalid company_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contact_no">Contact No <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact_no" name="contact_no" type="number" placeholder="Enter Contact No">
                                    <span class="text-danger is-invalid contact_no_err"></span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
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
                            <h4 class="card-title">Edit Contractor</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name">
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label  class="col-form-label" for="contractor_type">Contractor Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="contractor_type" id="contractor_type">
                                        <option value="">Select Contractor Type</option>
                                        @foreach ($contractorTypeList as $list)
                                            <option value="{{ $list->id }}">{{ $list->contractor_type_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid contractor_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name">
                                    <span class="text-danger is-invalid company_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email">
                                    <span class="text-danger is-invalid email_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contact_no">Contact No <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact_no" name="contact_no" type="number" placeholder="Enter Contact No">
                                    <span class="text-danger is-invalid contact_no_err"></span>
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
                                        <th>Contractor Name</th>
                                        <th>Contractor Type</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contractorsList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->contractor_name }}</td>
                                            <td>{{ $list->contractor_type_name }}</td>
                                            <td>{{ $list->company_name }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>{{ $list->contact_no }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Contractor" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Contractor" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
            url: '{{ route('contractor.store') }}',
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
                            window.location.href = '{{ route('contractor.index') }}';
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
        var url = "{{ route('contractor.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.contractor.id);
                    $("#editForm input[name='contractor_name']").val(data.contractor.contractor_name);
                    $("#editForm input[name='company_name']").val(data.contractor.company_name);
                    $("#editForm input[name='email']").val(data.contractor.email);
                    $("#editForm input[name='contact_no']").val(data.contractor.contact_no);
                    $("#editForm select[name='contractor_type']").val(data.contractor.contractor_type);
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
            var url = "{{ route('contractor.update', ":model_id") }}";
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
                                window.location.href = '{{ route('contractor.index') }}';
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
            title: "Are you sure to delete this contractor?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('contractor.destroy', ":model_id") }}";

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
