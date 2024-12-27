<x-admin.layout>
    <x-slot name="title">Vendors</x-slot>
    <x-slot name="heading">Vendors</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Vendors</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="pannumber">PAN Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pannumber" name="pannumber" type="text" placeholder="Enter PAN Number">
                                    <span class="text-danger is-invalid pannumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="gstnumber">GST Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="gstnumber" name="gstnumber" type="text" placeholder="Enter GST Number">
                                    <span class="text-danger is-invalid gstnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="epfnumber">EPF Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="epfnumber" name="epfnumber" type="text" placeholder="Enter EPF Number">
                                    <span class="text-danger is-invalid epfnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank">Bank Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank" name="bank" type="text" placeholder="Enter Bank">
                                    <span class="text-danger is-invalid bank_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="accountnumber">Account Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="accountnumber" name="accountnumber" type="text" placeholder="Enter Account Number">
                                    <span class="text-danger is-invalid accountnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="accountname">Account Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="accountname" name="accountname" type="text" placeholder="Enter Account Name">
                                    <span class="text-danger is-invalid accountname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vendorname">Vendor Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vendorname" name="vendorname" type="text" placeholder="Enter Vendor Name">
                                    <span class="text-danger is-invalid vendorname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ifsccode">IFSC Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsccode" name="ifsccode" type="text" placeholder="Enter IESC Code">
                                    <span class="text-danger is-invalid ifsccode_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Vendor Address<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contactnumber">Vendor Contact No <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contactnumber" name="contactnumber" type="number" placeholder="Enter Contact No">
                                    <span class="text-danger is-invalid contactnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="labourwelfarescheme">Labour Welfare Scheme <span class="text-danger">*</span></label>
                                    <select class="form-control" id="labourwelfarescheme" name="labourwelfarescheme">
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                    <span class="text-danger is-invalid labourwelfarescheme_err"></span>
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
                            <h4 class="card-title">Edit Vendor</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pannumber">PAN Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pannumber" name="pannumber" type="text" placeholder="Enter PAN Number">
                                    <span class="text-danger is-invalid pannumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="gstnumber">GST Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="gstnumber" name="gstnumber" type="text" placeholder="Enter GST Number">
                                    <span class="text-danger is-invalid gstnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="epfnumber">EPF Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="epfnumber" name="epfnumber" type="text" placeholder="Enter EPF Number">
                                    <span class="text-danger is-invalid epfnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank">Bank Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank" name="bank" type="text" placeholder="Enter Bank">
                                    <span class="text-danger is-invalid bank_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="accountnumber">Account Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="accountnumber" name="accountnumber" type="text" placeholder="Enter Account Number">
                                    <span class="text-danger is-invalid accountnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="accountname">Account Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="accountname" name="accountname" type="text" placeholder="Enter Account Name">
                                    <span class="text-danger is-invalid accountname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vendorname">Vendor Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vendorname" name="vendorname" type="text" placeholder="Enter Vendor Name">
                                    <span class="text-danger is-invalid vendorname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="ifsccode">IFSC Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="ifsccode" name="ifsccode" type="text" placeholder="Enter IESC Code">
                                    <span class="text-danger is-invalid ifsccode_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Vendor Address<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contactnumber">Vendor Contact No <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contactnumber" name="contactnumber" type="number" placeholder="Enter Contact No">
                                    <span class="text-danger is-invalid contactnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="labourwelfarescheme">Labour Welfare Scheme <span class="text-danger">*</span></label>
                                    <select class="form-control" id="labourwelfarescheme" name="labourwelfarescheme">
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="applicable">Applicable</option>
                                        <option value="not_applicable">Not Applicable</option>
                                    </select>
                                    <span class="text-danger is-invalid labourwelfarescheme_err"></span>
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
                                        <th>PAN Number</th>
                                        <th>GST Number</th>
                                        <th>EPF Number</th>
                                        <th>Bank Name</th>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th>Vendor Name</th>
                                        <th>IESC Code</th>
                                        <th>Vendor Address</th>
                                        <th>Vendor Contact No</th>
                                        <th>Labour Welfare Scheme</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contractorsList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->pannumber}}</td>
                                            <td>{{ $list->gstnumber }}</td>
                                            <td>{{ $list->epfnumber}}</td>
                                            <td>{{ $list->bank }}</td>
                                            <td>{{ $list->accountnumber}}</td>
                                            <td>{{ $list->accountname}}</td>
                                            <td>{{ $list->vendorname}}</td>
                                            <td>{{ $list->ifsccode}}</td>
                                            <td>{{ $list->address}}</td>
                                            <td>{{ $list->contactnumber}}</td>
                                            <td>{{ $list->labourwelfarescheme}}</td>
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
                    $("#editForm input[name='accountname']").val(data.contractor.accountname);
                    $("#editForm input[name='vendorname']").val(data.contractor.vendorname);
                    $("#editForm input[name='contactnumber']").val(data.contractor.contactnumber);
                    $("#editForm input[name='epfnumber']").val(data.contractor.epfnumber);
                    $("#editForm input[name='gstnumber']").val(data.contractor.gstnumber);
                    $("#editForm input[name='pannumber']").val(data.contractor.pannumber);
                    $("#editForm input[name='bank']").val(data.contractor.bank);
                    $("#editForm input[name='ifsccode']").val(data.contractor.ifsccode);
                    $("#editForm input[name='accountnumber']").val(data.contractor.accountnumber);
                    $("#editForm textarea[name='address']").val(data.contractor.address);
                    $("#editForm select[name='labourwelfarescheme']").val(data.contractor.labourwelfarescheme);
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
