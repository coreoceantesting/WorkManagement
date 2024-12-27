<x-admin.layout>
    <x-slot name="title">Approval and Sanction</x-slot>
    <x-slot name="heading">Approval and Sanction</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Approval and Sanction</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="deputy_engineer_sanction">Deputy Engineer Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="deputy_engineer_sanction" name="deputy_engineer_sanction" type="date" placeholder="Enter deputy engineer sanction">
                                    <span class="text-danger is-invalid deputy_engineer_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="city_engineer_sanction">City Engineer Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_engineer_sanction" name="city_engineer_sanction" type="date" placeholder="Enter city engineer sanction">
                                    <span class="text-danger is-invalid city_engineer_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_dept_sanction">Account Department Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_dept_sanction" name="account_dept_sanction" type="date" placeholder="Enter account dept sanction">
                                    <span class="text-danger is-invalid account_dept_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="additional_commissioner_sanction">Additional Commissioner Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="additional_commissioner_sanction" name="additional_commissioner_sanction" type="date" placeholder="Enter additional commissioner sanction">
                                    <span class="text-danger is-invalid additional_commissioner_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="commissioner_sanction">Commissioner Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="commissioner_sanction" name="commissioner_sanction" type="date" placeholder="Enter commissioner sanction">
                                    <span class="text-danger is-invalid commissioner_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="general_body_admin_sanction">General Body Admin Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="general_body_admin_sanction" name="general_body_admin_sanction" type="date" placeholder="Enter general body admin sanction">
                                    <span class="text-danger is-invalid general_body_admin_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="standing_committee_sanction">Standing Committee Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="standing_committee_sanction" name="standing_committee_sanction" type="date" placeholder="Enter standing committee sanction">
                                    <span class="text-danger is-invalid standing_committee_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution_no">Resolution No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution_no" name="resolution_no" type="text" placeholder="Enter resolution no">
                                    <span class="text-danger is-invalid resolution_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_date">Work Order Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_date" name="work_order_date" type="date" placeholder="Enter work order date">
                                    <span class="text-danger is-invalid work_order_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_no">Work Order No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_no" name="work_order_no" type="text" placeholder="Enter Work Order No">
                                    <span class="text-danger is-invalid work_order_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_duration_from">Work Order Duration From<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_duration_from" name="work_order_duration_from" type="date" placeholder="Enter work order duration from">
                                    <span class="text-danger is-invalid work_order_duration_from_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_duration_to">Work Order Duration To<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_duration_from" name="work_order_duration_to" type="date" placeholder="Enter work order duration to">
                                    <span class="text-danger is-invalid work_order_duration_to_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="role">Role<span class="text-danger">*</span></label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="">---Select---</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Deputy_Engineer">Deputy Engineer</option>
                                        <option value="Executive_Engineer">Executive Engineer</option>
                                    </select>
                                    <span class="text-danger is-invalid role_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rolename">Name of Engineer/Deputy Engineer/Executive Engineer<span class="text-danger">*</span></label>
                                    <input class="form-control" id="rolename" name="rolename" type="text" placeholder="Enter Role Name">
                                    <span class="text-danger is-invalid rolename_err"></span>
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
                            <h4 class="card-title">Edit Bank Gaurantee/Security Deposite</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="deputy_engineer_sanction">Deputy Engineer Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="deputy_engineer_sanction" name="deputy_engineer_sanction" type="date" placeholder="Enter deputy engineer sanction">
                                    <span class="text-danger is-invalid deputy_engineer_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="city_engineer_sanction">City Engineer Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="city_engineer_sanction" name="city_engineer_sanction" type="date" placeholder="Enter city engineer sanction">
                                    <span class="text-danger is-invalid city_engineer_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="account_dept_sanction">Account Department Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="account_dept_sanction" name="account_dept_sanction" type="date" placeholder="Enter account dept sanction">
                                    <span class="text-danger is-invalid account_dept_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="additional_commissioner_sanction">Additional Commissioner Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="additional_commissioner_sanction" name="additional_commissioner_sanction" type="date" placeholder="Enter additional commissioner sanction">
                                    <span class="text-danger is-invalid additional_commissioner_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="commissioner_sanction">Commissioner Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="commissioner_sanction" name="commissioner_sanction" type="date" placeholder="Enter commissioner sanction">
                                    <span class="text-danger is-invalid commissioner_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="general_body_admin_sanction">General Body Admin Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="general_body_admin_sanction" name="general_body_admin_sanction" type="date" placeholder="Enter general body admin sanction">
                                    <span class="text-danger is-invalid general_body_admin_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="standing_committee_sanction">Standing Committee Sanction<span class="text-danger">*</span></label>
                                    <input class="form-control" id="standing_committee_sanction" name="standing_committee_sanction" type="date" placeholder="Enter standing committee sanction">
                                    <span class="text-danger is-invalid standing_committee_sanction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution_no">Resolution No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution_no" name="resolution_no" type="text" placeholder="Enter resolution no">
                                    <span class="text-danger is-invalid resolution_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_date">Work Order Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_date" name="work_order_date" type="date" placeholder="Enter work order date">
                                    <span class="text-danger is-invalid work_order_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_no">Work Order No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_no" name="work_order_no" type="text" placeholder="Enter Work Order No">
                                    <span class="text-danger is-invalid work_order_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_duration_from">Work Order Duration From<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_duration_from" name="work_order_duration_from" type="date" placeholder="Enter work order duration from">
                                    <span class="text-danger is-invalid work_order_duration_from_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_duration_to">Work Order Duration To<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_duration_from" name="work_order_duration_to" type="date" placeholder="Enter work order duration to">
                                    <span class="text-danger is-invalid work_order_duration_to_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="role">Role<span class="text-danger">*</span></label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="">---Select---</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Deputy_Engineer">Deputy Engineer</option>
                                        <option value="Executive_Engineer">Executive Engineer</option>
                                    </select>
                                    <span class="text-danger is-invalid role_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rolename">Name of Engineer/Deputy Engineer/Executive Engineer<span class="text-danger">*</span></label>
                                    <input class="form-control" id="rolename" name="rolename" type="text" placeholder="Enter Role Name">
                                    <span class="text-danger is-invalid rolename_err"></span>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Update</button>
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
                                        <th>Deputy Engineer Sanction</th>
                                        <th>City Engineer Sanction</th>
                                        <th>Account Department sanction</th>
                                        <th>Additional Commissioner Sanction</th>
                                        <th>Commissioner Sanction</th>
                                        <th>General Body Admin Sanction</th>
                                        <th>Standing Committee Sanction</th>
                                        <th>Resolution No</th>
                                        <th>Work Order Date</th>
                                        <th>Work Order No</th>
                                        <th>Work Order Duration From</th>
                                        <th>Work Order Duration To</th>
                                        <th>Role</th>
                                        <th>Name of Engineer/Deputy Engineer/Executive Engineer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvalsanction as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->deputy_engineer_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->city_engineer_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->account_dept_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->additional_commissioner_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->commissioner_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->general_body_admin_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->standing_committee_sanction)->format('d-m-Y') }}</td>
                                            <td>{{ $list->resolution_no}}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->work_order_date)->format('d-m-Y') }}</td>
                                            <td>{{ $list->work_order_no}}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->work_order_duration_from)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse( $list->work_order_duration_to)->format('d-m-Y') }}</td>
                                            <td>{{ $list->role}}</td>
                                            <td>{{ $list->rolename}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit BGSD" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete BGSD" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('approvalsanction.store') }}',
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
                            window.location.href = '{{ route('approvalsanction.index') }}';
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
        var url = "{{ route('approvalsanction.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.approvalsanction.id);
                    $("#editForm input[name='deputy_engineer_sanction']").val(data.approvalsanction.deputy_engineer_sanction);
                    $("#editForm input[name='city_engineer_sanction']").val(data.approvalsanction.city_engineer_sanction);
                    $("#editForm input[name='account_dept_sanction']").val(data.approvalsanction.account_dept_sanction);
                    $("#editForm input[name='additional_commissioner_sanction']").val(data.approvalsanction.additional_commissioner_sanction);
                    $("#editForm input[name='commissioner_sanction']").val(data.approvalsanction.commissioner_sanction);
                    $("#editForm input[name='general_body_admin_sanction']").val(data.approvalsanction.general_body_admin_sanction);
                    $("#editForm input[name='standing_committee_sanction']").val(data.approvalsanction.standing_committee_sanction);
                    $("#editForm input[name='resolution_no']").val(data.approvalsanction.resolution_no);
                    $("#editForm input[name='work_order_date']").val(data.approvalsanction.work_order_date);
                    $("#editForm input[name='work_order_no']").val(data.approvalsanction.work_order_no);
                    $("#editForm input[name='work_order_duration_from']").val(data.approvalsanction.work_order_duration_from);
                    $("#editForm input[name='work_order_duration_to']").val(data.approvalsanction.work_order_duration_to);
                    $("#editForm select[name='role']").val(data.approvalsanction.role);
                    $("#editForm input[name='rolename']").val(data.approvalsanction.rolename);
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
            var url = "{{ route('approvalsanction.update', ":model_id") }}";
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
                                window.location.href = '{{ route('approvalsanction.index') }}';
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
            title: "Are you sure to delete this Approval And Sanction?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('approvalsanction.destroy', ":model_id") }}";

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

