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
                            <h4 class="card-title">Add Contractor</h4>
                        </div>
                        <div class="card-body">
                            @include('admin.masters.contractor.form', ['contractorCategorys' => $contractorCategorys,'mode'=>''])

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
                            @include('admin.masters.contractor.form',['contractorCategorys' => $contractorCategorys,'mode'=>'edit'])
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
                            <table id="datatable" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Email</th>

                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>




</x-admin.layout>


{{-- Add --}}
<script>


$('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("contractors.index") }}',
        dom: "Blfrtip",
        buttons: ["copy", "csv", "excel", "print", "pdf"],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'company_name', name: 'company_name' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        drawCallback: function () {
            feather.replace(); // re-render feather icons
        }
    });
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('contractors.store') }}',
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
                            window.location.href = '{{ route('contractors.index') }}';
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
    $("#datatable").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('contractors.edit', ":model_id") }}";

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
                   // Fill form fields with contractor data
                    $("#editForm input[name='name']").val(data.contractor.name);
                    $("#editForm select[name='contractor_type_id']").val(data.contractor.contractor_type_id).trigger('change');
                    $("#editForm select[name='contractor_sub_type_id']").val(data.contractor.contractor_sub_type_id).trigger('change');

                    fetchContractSubType(
                        "#editForm select[name='contractor_type_id']",
                        "#editForm select[name='contractor_sub_type_id']",
                        data.contractor.contractor_sub_type_id
                    );

                    $("#editForm input[name='company_name']").val(data.contractor.company_name);
                    $("#editForm input[name='email']").val(data.contractor.email);
                    $("#editForm textarea[name='address']").val(data.contractor.address);
                    $("#editForm input[name='mobile_no']").val(data.contractor.mobile_no);
                    $("#editForm input[name='aadhaar_no']").val(data.contractor.aadhaar_no);
                    $("#editForm input[name='gst_no']").val(data.contractor.gst_no);
                    $("#editForm input[name='vat_no']").val(data.contractor.vat_no);
                    $("#editForm input[name='pan_no']").val(data.contractor.pan_no);
                    $("#editForm input[name='bank_account_no']").val(data.contractor.bank_account_no);
                    $("#editForm input[name='bank_name']").val(data.contractor.bank_name);
                    $("#editForm input[name='bank_branch_name']").val(data.contractor.bank_branch_name);
                    $("#editForm input[name='ifsc_code']").val(data.contractor.ifsc_code);
                    $("#editForm select[name='status']").val(data.contractor.status).trigger('change');

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
        $('.select2').select2();
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('contractors.update', ":model_id") }}";
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
                                window.location.href = '{{ route('contractors.index') }}';
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
    $("#datatable").on("click", ".rem-element", function(e) {
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
                var url = "{{ route('contractors.destroy', ":model_id") }}";

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


    function fetchContractSubType(contractor_element, sub_contractor_element, selected_sub_id = null) {
        var category_id = $(contractor_element).val();

        if (!category_id) {
            $(sub_contractor_element).html('<option value="">Select Contractor Sub Type</option>');
            return;
        }

        // Show loading
        $(sub_contractor_element).html('<option value="">Loading Contractor Sub Type...</option>');

        // Generate URL dynamically
        var url = "{{ route('contractor_types.contractor_sub_types', ':category_id') }}";
        url = url.replace(':category_id', category_id);

        // AJAX request to fetch sub categories
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $(sub_contractor_element).empty();
                $(sub_contractor_element).append('<option value="">Select Sub Item Category</option>');

                if (data.contractorSubTypes && data.contractorSubTypes.length) {
                    data.contractorSubTypes.forEach(function(item) {
                        var selected = selected_sub_id == item.id ? 'selected' : '';
                        $(sub_contractor_element).append(
                            `<option value="${item.id}" ${selected}>${item.name}</option>`
                        );
                    });
                } else {
                    // $(sub_contractor_element).append('<option value="">No Sub Categories Found</option>');
                }
            },
            error: function() {
                alert("Something went wrong while fetching sub categories.");
            },
        });
    }
</script>
