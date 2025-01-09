<x-admin.layout>
    <x-slot name="title">Measuremnt Book</x-slot>
    <x-slot name="heading">Measuremnt Book</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Measuremnt Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="workorderno">Work Order No<span class="text-danger">*</span></label>
                                    <select class="form-control" id="workorderno" name="workorderno" required>
                                        <option value="" disabled selected>Select Work Order No</option>
                                        @foreach($workorder as $workorders)
                                            <option value="{{ $workorders->id }}" {{ old('workorders') == $workorders->id ? 'selected' : '' }}>
                                                {{ $workorders->work_order_no }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workorderno_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_account">Work Order Account<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_account" name="work_order_account" required>
                                    <span class="text-danger is-invalid work_order_account_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_date">Work Order Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_date" name="work_order_date" type="date" readonly>
                                    <span class="text-danger is-invalid work_order_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_form_date">Agreement Form Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_form_date" name="agreement_form_date" type="date" >
                                    <span class="text-danger is-invalid agreement_form_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_to_date">Agreement To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_to_date" name="agreement_to_date" type="date" >
                                    <span class="text-danger is-invalid agreement_to_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_no">Agreement No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_no" name="agreement_no" type="text" readonly>
                                    <span class="text-danger is-invalid agreement_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="measurement_date">Measurement Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="measurement_date" name="measurement_date" type="date" >
                                    <span class="text-danger is-invalid measurement_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="ledger_no">Ledger No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="ledger_no" name="ledger_no" type="text" >
                                    <span class="text-danger is-invalid ledger_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="description" name="description" type="text" >
                                    <span class="text-danger is-invalid description_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="pages_no">Page No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pages_no" name="pages_no" type="text" >
                                    <span class="text-danger is-invalid pages_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="engineer_name">Engineer Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="engineer_name" name="engineer_name" type="text" >
                                    <span class="text-danger is-invalid engineer_name_err"></span>
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
            <div class="col-sm-12">
                <div class="card">
                    <form class="form-horizontal form-bordered" method="post" id="editForm">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Edit Measuremnt Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="col-md-4">
                                <label class="col-form-label" for="workorderno">Work Order No<span class="text-danger">*</span></label>
                                <select class="form-control" id="workorderno" name="workorderno" required>
                                    <option value="" disabled selected>Select Work Order No</option>
                                    @foreach($workorder as $workorders)
                                        <option value="{{ $workorders->id }}" {{ old('workorders') == $workorders->id ? 'selected' : '' }}>
                                            {{ $workorders->work_order_no }} 
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger is-invalid workorderno_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="work_order_account">Work Order Account<span class="text-danger">*</span></label>
                                <input class="form-control" id="work_order_account" name="work_order_account" required>
                                <span class="text-danger is-invalid work_order_account_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="work_order_date">Work Order Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="work_order_date" name="work_order_date" type="date" readonly>
                                <span class="text-danger is-invalid work_order_date_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="agreement_form_date">Agreement Form Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="agreement_form_date" name="agreement_form_date" type="date" >
                                <span class="text-danger is-invalid agreement_form_date_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="agreement_to_date">Agreement To Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="agreement_to_date" name="agreement_to_date" type="date" >
                                <span class="text-danger is-invalid agreement_to_date_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="agreement_no">Agreement No<span class="text-danger">*</span></label>
                                <input class="form-control" id="agreement_no" name="agreement_no" type="text" readonly>
                                <span class="text-danger is-invalid agreement_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="measurement_date">Measurement Date<span class="text-danger">*</span></label>
                                <input class="form-control" id="measurement_date" name="measurement_date" type="date" >
                                <span class="text-danger is-invalid measurement_date_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="ledger_no">Ledger No<span class="text-danger">*</span></label>
                                <input class="form-control" id="ledger_no" name="ledger_no" type="text" >
                                <span class="text-danger is-invalid ledger_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="description">Description<span class="text-danger">*</span></label>
                                <input class="form-control" id="description" name="description" type="text" >
                                <span class="text-danger is-invalid description_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="pages_no">Page No<span class="text-danger">*</span></label>
                                <input class="form-control" id="pages_no" name="pages_no" type="text" >
                                <span class="text-danger is-invalid pages_no_err"></span>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label" for="engineer_name">Engineer Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="engineer_name" name="engineer_name" type="text" >
                                <span class="text-danger is-invalid engineer_name_err"></span>
                            </div>
                        </div>
                        </div>    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="editSubmit">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
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
                                        <th>Work Order No</th>
                                        <th>Work Order Account</th>
                                        <th>Agreement Formdate</th>
                                        <th>Agreement Todate</th>
                                        <th>Work Orderdate</th>
                                        <th>Agreementno</th>
                                        <th>Measurement date</th>
                                        <th>Ledger No</th>
                                        <th>Description</th>
                                        <th>Pages No</th>
                                        <th>Engineer Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($measuremntbook as $list)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list?->Name}}</td>
                                        <td>{{ $list?->work_order_account}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->agreement_form_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->agreement_to_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->work_order_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->agreement_no}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->measurement_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->ledger_no}}</td>
                                        <td>{{ $list?->description}}</td>
                                        <td>{{ $list?->pages_no}}</td>
                                        <td>{{ $list?->engineer_name}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" value="{{ $list->id }}" title="Edit ward" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" value="{{ $list->id }}" title="Delete ward" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('measurementbook.store') }}',
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
                            window.location.href = '{{ route('measurementbook.index') }}';
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
    var url = "{{ route('measurementbook.edit', ':model_id') }}"; 
    url = url.replace(':model_id', model_id); 

    $.ajax({
        url: url,
        type: 'GET',
        data: {
            '_token': "{{ csrf_token() }}" 
        },
        success: function(data) {
            if (data.result === 1) {
                $("#editContainer").show();

                $("#editForm input[name='edit_model_id']").val(data.measurementbooks.id); 
                $("#editForm select[name='workorderno']").val(data.measurementbooks.work_order_number);
                $("#editForm input[name='work_order_account']").val(data.measurementbooks.work_order_account);
                $("#editForm input[name='work_order_date']").val(data.measurementbooks.work_order_date); 
                $("#editForm input[name='agreement_form_date']").val(data.measurementbooks.agreement_form_date); 
                $("#editForm input[name='agreement_to_date']").val(data.measurementbooks.agreement_to_date); 
                $("#editForm input[name='agreement_no']").val(data.measurementbooks.agreement_no); 
                $("#editForm input[name='measurement_date']").val(data.measurementbooks.measurement_date); 
                $("#editForm input[name='ledger_no']").val(data.measurementbooks.ledger_no);
                $("#editForm input[name='description']").val(data.measurementbooks.description); 
                $("#editForm input[name='pages_no']").val(data.measurementbooks.pages_no); 
                $("#editForm input[name='engineer_name']").val(data.measurementbooks.engineer_name); 
            } else {
                alert(data.message || "Error fetching data.");
            }
        },
        error: function(error) {
            alert("Something went wrong while fetching data.");
        }
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
            var url = "{{ route('measurementbook.update', ":model_id") }}";
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
                                window.location.href = '{{ route('measurementbook.index') }}';
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
            title: "Are you sure to delete this ward?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('measurementbook.destroy', ":model_id") }}";

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



    $(document).ready(function() {
    $('#workorderno').on('change', function() {
        var workOrderId = $(this).val();

        if (workOrderId) {
            $.ajax({
                url: '{{ route('workorderdata') }}',
                method: 'GET',
                data: {
                    work_order_id: workOrderId
                },
                success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        $('#agreement_no').val(response.agreement_no);
                        $('#work_order_date').val(response.work_order_date);
                    }
                },
                error: function() {
                    alert('Error fetching work order details.');
                }
            });
        } else {
            $('#work_order_account').val('');
            $('#work_order_date').val('');
        }
    });
});


    
</script>
