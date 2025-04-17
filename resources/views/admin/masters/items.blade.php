<x-admin.layout>
    <x-slot name="title">Items</x-slot>
    <x-slot name="heading">Items</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="description">Item Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Item Description" rows="4"></textarea>

                                    <span class="text-danger is-invalid description_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="initial">Initial <span class="text-danger">*</span></label>
                                    <input class="form-control" id="initial" name="initial" type="text" placeholder="Enter Scheme Initial">
                                    <span class="text-danger is-invalid initial_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="initial">Rate (Rs) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="rate" name="rate" type="number" placeholder="Enter rate">
                                    <span class="text-danger is-invalid rate_err"></span>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label" for="unit_id">Unit <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="unit_id" name="unit_id">
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid unit_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="item_category_id">Item Category <span class="text-danger">*</span></label>

                                    <select class="form-control select2" id="item_category_id" name="item_category_id" onchange="fetchItemSubCategory(this,'#item_sub_category_id')">
                                        <option value="">Select Item Category</option>
                                        @foreach($item_categories as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger is-invalid item_category_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="item_sub_category_id">Item Sub Category <span class="text-danger">*</span></label>

                                    <select class="form-control select2" id="item_sub_category_id" name="item_sub_category_id">
                                        <option value="">Select Sub Item Category</option>

                                    </select>

                                    <span class="text-danger is-invalid item_sub_category_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="" disabled selected>-- Select Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
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
                            <h4 class="card-title">Edit Department</h4>
                        </div>


                        <div class="card-body">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="description">Item Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Enter Item Description" rows="4"></textarea>

                                    <span class="text-danger is-invalid description_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="initial">Initial <span class="text-danger">*</span></label>
                                    <input class="form-control" id="initial" name="initial" type="text" placeholder="Enter Scheme Initial">
                                    <span class="text-danger is-invalid initial_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="initial">Rate (Rs) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="rate" name="rate" type="number" placeholder="Enter rate">
                                    <span class="text-danger is-invalid rate_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="unit_id">Unit <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="unit_id" name="unit_id">
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid unit_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="item_category_id">Item Category <span class="text-danger">*</span></label>

                                    <select class="form-control select2" id="item_category_id" name="item_category_id" onchange="fetchItemSubCategory(this,'#item_sub_category_id_edit')">
                                        <option value="">Select Item Category</option>
                                        @foreach($item_categories as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger is-invalid item_category_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="item_sub_category_id_edit">Item Sub Category <span class="text-danger">*</span></label>

                                    <select class="form-control select2" id="item_sub_category_id_edit" name="item_sub_category_id">
                                        <option value="">Select Sub Item Category</option>

                                    </select>

                                    <span class="text-danger is-invalid item_sub_category_id_err"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="" disabled selected>-- Select Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
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
                            <table id="datatable" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Item Description</th>
                                        <th>Initial</th>
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
            ajax: '{{ route("items.index") }}', // Make sure route matches
            dom: "Blfrtip",
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Items List',
                    exportOptions: { columns: [0, 1, 2, 3] }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Items List',
                    exportOptions: { columns: [0, 1, 2, 3] }
                },
                'copy', 'csv', 'print'
            ],
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'description', name: 'description' },
                { data: 'initial', name: 'initial' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            drawCallback: function () {
                feather.replace(); // Refresh feather icons
            }
    });
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('items.store') }}',
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
                            window.location.href = '{{ route('items.index') }}';
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
        var url = "{{ route('items.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.item.id);
                    $("#editForm textarea[name='description']").html(data.item.description);
                    $("#editForm input[name='initial']").val(data.item.initial);
                    $("#editForm input[name='rate']").val(data.item.rate);
                    $("#editForm select[name='item_category_id']")
                        .val(data.item.item_category_id)
                        .change();

                    fetchItemSubCategory(
                        "#editForm select[name='item_category_id']",
                        "#editForm select[name='item_sub_category_id']",
                        data.item.item_sub_category_id
                    );

                    $("#editForm select[name='unit_id']")
                        .val(data.item.unit_id)
                        .change();


                    $("#editForm select[name='status']").val(data.item.status);
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
            var url = "{{ route('items.update', ":model_id") }}";
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
                                window.location.href = '{{ route('items.index') }}';
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
            title: "Are you sure to delete this Item?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('items.destroy', ":model_id") }}";

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
    function fetchItemSubCategory(category_element, sub_category_element, selected_sub_id = null) {
        var category_id = $(category_element).val();

        if (!category_id) {
            $(sub_category_element).html('<option value="">Select Sub Item Category</option>');
            return;
        }

        // Show loading
        $(sub_category_element).html('<option value="">Loading Sub Item Category...</option>');

        // Generate URL dynamically
        var url = "{{ route('item_categories.sub_categories', ':category_id') }}";
        url = url.replace(':category_id', category_id);

        // AJAX request to fetch sub categories
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $(sub_category_element).empty();
                $(sub_category_element).append('<option value="">Select Sub Item Category</option>');

                if (data.itemSubCategory && data.itemSubCategory.length) {
                    data.itemSubCategory.forEach(function(item) {
                        var selected = selected_sub_id == item.id ? 'selected' : '';
                        $(sub_category_element).append(
                            `<option value="${item.id}" ${selected}>${item.name}</option>`
                        );
                    });
                } else {
                    // $(sub_category_element).append('<option value="">No Sub Categories Found</option>');
                }
            },
            error: function() {
                alert("Something went wrong while fetching sub categories.");
            },
        });
    }

</script>
