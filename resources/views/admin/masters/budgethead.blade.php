<x-admin.layout>
    <x-slot name="title">Expenditure Budget</x-slot>
    <x-slot name="heading">Expenditure Budget</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header"><h4 class="card-title">Add Expenditure Budget</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="budgetyear">Select Budget Year<span class="text-danger">*</span></label>
                                    <select class="form-control" id="budgetyear" name="budgetyear">
                                        <option value="">-- select --</option>
                                        @foreach($budgetheads as $budget)
                                        <option value="{{ $budget->id }}">{{ $budget->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid title_err"></span>
                            </div>
                            
                            <div class="col-md-4">
                                    <label class="col-form-label" for="department">Select Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="">-- select --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_name_err"></span>
                            </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgethead">Select Budget Head<span class="text-danger">*</span></label>
                                    <select class="form-control" id="budgethead" name="budgethead">
                                        <option value="">-- select --</option>
                                        @foreach($minor_funds as $minor_fund)
                                        <option value="{{ $minor_fund->id }}">{{ $minor_fund->minor_fund_code }}{{ $minor_fund->minor_fund_code_description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid minor_fund_code_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgetamount">Budget Provision Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="budgetamount" name="budgetamount" type="text" placeholder="Enter Budget Provision Amount">
                                    <span class="text-danger is-invalid budgetamount_err"></span>
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
                            <h4 class="card-title">Edit budget Head</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="budgetyear">Select Budget Year<span class="text-danger">*</span></label>
                                    <select class="form-control" id="budgetyear" name="budgetyear">
                                        <option value=""  selected>-- Select --</option>

                                    </select>
                                    <span class="text-danger is-invalid budgetyear_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Select Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department">
                                        <option value=""  selected>-- Select --</option>

                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgethead">Select Budget Head<span class="text-danger">*</span></label>
                                    <select class="form-control" id="budgethead" name="budgethead">
                                        <option value=""  selected>-- Select --</option>

                                    </select>
                                    <span class="text-danger is-invalid budgethead_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgetamount">Budget Provision Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="budgetamount" name="budgetamount" type="text" placeholder="Enter Budget Provision Amount">
                                    <span class="text-danger is-invalid budgetamount_err"></span>
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
                                        <th>Budget Year</th>
                                        <th>Department</th>
                                        <th>Budget Head</th>
                                        <th>Budget Provision Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($budgetheadList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->budgetyearData->title }}</td>
                                            <td>{{ $list->departmentData->department_name }}</td>
                                            <td>{{ $list->minorfundData->minor_fund_code}}{{ $list->minorfundData->minor_fund_code_description}}</td>
                                            <td>{{ $list->budgetamount}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit budgethead" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete budgethead" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('budgethead.store') }}',
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
                            window.location.href = '{{ route('budgethead.index') }}';
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
        var url = "{{ route('budgethead.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.budgethead.id);
                    $("#editForm input[name='budgetamount']").val(data.budgethead.budgetamount);
                    $("#editForm select[name='budgetyear']").html(data.mastersHtml);
                    $("#editForm select[name='department']").html(data.mastersHtml1);
                    $("#editForm select[name='budgethead']").html(data.mastersHtml2);
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
            var url = "{{ route('budgethead.update', ":model_id") }}";
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
                                window.location.href = '{{ route('budgethead.index') }}';
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
            title: "Are you sure to delete this Category of Work ?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('budgethead.destroy', ":model_id") }}";

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
