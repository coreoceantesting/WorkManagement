<x-admin.layout>
    <x-slot name="title">Bank Gaurantee/Security Deposite</x-slot>
    <x-slot name="heading">Bank Gaurantee/Security Deposite</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Bank Gaurantee/Security Deposite</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="defectliabilityperiod">Defect Liability Period <span class="text-danger">*</span></label>
                                    <input class="form-control" id="defectliabilityperiod" name="defectliabilityperiod" type="text" placeholder="Enter Defect Liability Period">
                                    <span class="text-danger is-invalid defectliabilityperiod_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydeposit">Security Deposit<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydeposit" name="securitydeposit" type="text" placeholder="Enter Security Deposit">
                                    <span class="text-danger is-invalid securitydeposit_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bankname">Bank Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bankname" name="bankname" type="text" placeholder="Enter Bank Name">
                                    <span class="text-danger is-invalid bankname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydepositvalidity">Security Deposite Validity<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydepositvalidity" name="securitydepositvalidity" type="date" placeholder="Enter Security Deposite Validity">
                                    <span class="text-danger is-invalid securitydepositvalidity_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydepositamount">Security Deposite Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydepositamount" name="securitydepositamount" type="text" placeholder="Enter Security Deposite Amount">
                                    <span class="text-danger is-invalid securitydepositamount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="extentiondate">Extention Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="extentiondate" name="extentiondate" type="date" placeholder="Enter Extention Date">
                                    <span class="text-danger is-invalid extentiondate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="completiondate">Completion Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="completiondate" name="completiondate" type="date" placeholder="Enter Completion Date">
                                    <span class="text-danger is-invalid completiondate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="oldtendorvalue">Old Tendor Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="oldtendorvalue" name="oldtendorvalue" type="text" placeholder="Enter Old Tendor Value">
                                    <span class="text-danger is-invalid oldtendorvalue_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tenderdate">Tender Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="tenderdate" name="tenderdate" type="date" placeholder="Enter Tender Date">
                                    <span class="text-danger is-invalid tenderdate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tap">TAP <span class="text-danger">*</span></label>
                                    <select class="form-control" id="tap" name="tap">
                                        <option value="">Select TAP</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid tap_err"></span>
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
                                    <label class="col-form-label" for="defectliabilityperiod">Defect Liability Period <span class="text-danger">*</span></label>
                                    <input class="form-control" id="defectliabilityperiod" name="defectliabilityperiod" type="text" placeholder="Enter Defect Liability Period">
                                    <span class="text-danger is-invalid defectliabilityperiod_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydeposit">Security Deposit<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydeposit" name="securitydeposit" type="text" placeholder="Enter Security Deposit">
                                    <span class="text-danger is-invalid securitydeposit_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bankname">Bank Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bankname" name="bankname" type="text" placeholder="Enter Bank Name">
                                    <span class="text-danger is-invalid bankname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydepositvalidity">Security Deposite Validity<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydepositvalidity" name="securitydepositvalidity" type="date" placeholder="Enter Security Deposite Validity">
                                    <span class="text-danger is-invalid securitydepositvalidity_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="securitydepositamount">Security Deposite Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="securitydepositamount" name="securitydepositamount" type="text" placeholder="Enter Security Deposite Amount">
                                    <span class="text-danger is-invalid securitydepositamount_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="extentiondate">Extention Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="extentiondate" name="extentiondate" type="date" placeholder="Enter Extention Date">
                                    <span class="text-danger is-invalid extentiondate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="completiondate">Completion Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="completiondate" name="completiondate" type="date" placeholder="Enter Completion Date">
                                    <span class="text-danger is-invalid completiondate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="oldtendorvalue">Old Tendor Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="oldtendorvalue" name="oldtendorvalue" type="text" placeholder="Enter Old Tendor Value">
                                    <span class="text-danger is-invalid oldtendorvalue_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tenderdate">Tender Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="tenderdate" name="tenderdate" type="date" placeholder="Enter Tender Date">
                                    <span class="text-danger is-invalid tenderdate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tap">TAP <span class="text-danger">*</span></label>
                                    <select class="form-control" id="tap" name="tap">
                                        <option value="">Select TAP</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid tap_err"></span>
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
                                        <th>Defect Liability Period</th>
                                        <th>Security Deposit</th>
                                        <th>Bank Name</th>
                                        <th>Security Deposite Validity</th>
                                        <th>Security Deposite Amount</th>
                                        <th>Extention Date </th>
                                        <th>Completion Date </th>
                                        <th>Old Tendor Value</th>
                                        <th>Tender Date</th>
                                        <th>TAP </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BgsdList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->defectliabilityperiod }}</td>
                                            <td>{{ $list->securitydeposit }}</td>
                                            <td>{{ $list->bankname	 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->securitydepositvalidity )->format('d-m-Y') }}</td>
                                            <td>{{ $list->securitydepositamount }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->extentiondate )->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->completiondate )->format('d-m-Y') }}</td>
                                            <td>{{ $list->oldtendorvalue }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->tenderdate )->format('d-m-Y') }}</td>
                                            <td>{{ $list->tap }}</td>
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
            url: '{{ route('bgsd.store') }}',
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
                            window.location.href = '{{ route('bgsd.index') }}';
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
        var url = "{{ route('bgsd.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.Bgsd.id);
                    $("#editForm input[name='defectliabilityperiod']").val(data.Bgsd.defectliabilityperiod);
                    $("#editForm input[name='securitydeposit']").val(data.Bgsd.securitydeposit);
                    $("#editForm input[name='bankname']").val(data.Bgsd.bankname);
                    $("#editForm input[name='securitydepositvalidity']").val(data.Bgsd.securitydepositvalidity);
                    $("#editForm input[name='securitydepositamount']").val(data.Bgsd.securitydepositamount);
                    $("#editForm input[name='extentiondate']").val(data.Bgsd.extentiondate);
                    $("#editForm input[name='completiondate']").val(data.Bgsd.completiondate);
                    $("#editForm input[name='oldtendorvalue']").val(data.Bgsd.oldtendorvalue);
                    $("#editForm input[name='tenderdate']").val(data.Bgsd.tenderdate);
                    $("#editForm select[name='tap']").val(data.Bgsd.tap);
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
            var url = "{{ route('bgsd.update', ":model_id") }}";
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
                                window.location.href = '{{ route('bgsd.index') }}';
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
            title: "Are you sure to delete this Bank Gaurantee/Security Deposite?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('bgsd.destroy', ":model_id") }}";

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
