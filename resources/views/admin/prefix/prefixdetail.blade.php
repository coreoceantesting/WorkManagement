<x-admin.layout>
    <x-slot name="title">Prefix Details</x-slot>
    <x-slot name="heading">Prefix Details</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Prefix Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="select Description">Main Description<span class="text-danger">*</span></label>
                                    <select class="form-control" id="select Description" name="mainprefix_id">
                                        <option value="">-- select Main Description --</option>
                                        @foreach($mainprefix as $mainpre)
                                        <option value="{{ $mainpre->id }}">{{ $mainpre->description }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid mainprefix_id__err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="prefixdescription">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="prefixdescription" name="prefixdescription" type="text" placeholder="Enter Prefix Description">
                                    <span class="text-danger is-invalid prefixdescription_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="descriptionregional">Description(Regional)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="descriptionregional" name="descriptionregional" type="text" placeholder="Enter Prefix Description Regional">
                                    <span class="text-danger is-invalid descriptionregional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="value">Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="value" name="value" type="text" placeholder="Enter Value">
                                    <span class="text-danger is-invalid value_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="othervalue">Other Value</label>
                                    <input class="form-control" id="othervalue" name="othervalue" type="text" placeholder="Enter Other Value">
                                    <span class="text-danger is-invalid othervalue_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="default">Default<span class="text-danger">*</span></label>
                                    <input class="form-control" id="default" name="default" type="text" placeholder="Enter Default">
                                    <span class="text-danger is-invalid default_err"></span>
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
                            <h4 class="card-title">Edit Prefix Details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="select description">Select Description<span class="text-danger">*</span></label>
                                    <select class="form-control" id="select description" name="mainprefix_id">
                                        <option value=""  selected>-- Select Description --</option>

                                    </select>
                                    <span class="text-danger is-invalid mainprefix_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="description" name="prefixdescription" type="text" placeholder="Enter Prefix Description">
                                    <span class="text-danger is-invalid description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="descriptionregional">Description(Regional)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="descriptionregional" name="descriptionregional" type="text" placeholder="Enter Prefix Description Regional">
                                    <span class="text-danger is-invalid descriptionregional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="value">Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="value" name="value" type="text" placeholder="Enter Value">
                                    <span class="text-danger is-invalid value_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="othervalue">Other Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="othervalue" name="othervalue" type="text" placeholder="Enter Other Value">
                                    <span class="text-danger is-invalid othervalue_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="default">Default<span class="text-danger">*</span></label>
                                    <input class="form-control" id="default" name="default" type="text" placeholder="Enter Default">
                                    <span class="text-danger is-invalid default_err"></span>
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
                                        <th>Main Description</th>
                                        <th>Prefix Name</th>
                                        <th>Prefix Description</th>
                                        <th>Status</th>
                                        <th>Description(Regional)</th>
                                        <th>Value</th>
                                        <th>Other Value</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prefixdetail as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list?->mainprefix?->description}}</td>
                                            <td>{{ $list?->mainprefix?->name}}</td>
                                            <td>{{ $list->prefixdescription }}</td>
                                            <td> @if($list?->mainprefix?->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{ $list->descriptionregional }}</td>
                                            <td>{{ $list->value }}</td>
                                            <td>{{ $list->othervalue }}</td>
                                            <td>{{ $list->default }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Prefix Details" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Prefix Details" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('prefixdetail.store') }}',
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
                            window.location.href = '{{ route('prefixdetail.index') }}';
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
        var url = "{{ route('prefixdetail.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.prefixdetail.id);
                    $("#editForm select[name='mainprefix_id']").html(data.mastersHtml);
                    $("#editForm select[name='mainprefix_id']").html(data.mastersHtml1);
                    $("#editForm input[name='prefixdescription']").val(data.prefixdetail.prefixdescription);
                    $("#editForm input[name='descriptionregional']").val(data.prefixdetail.descriptionregional);
                    $("#editForm input[name='value']").val(data.prefixdetail.value);
                    $("#editForm input[name='othervalue']").val(data.prefixdetail.othervalue);
                    $("#editForm input[name='default']").val(data.prefixdetail.default);
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
            var url = "{{ route('prefixdetail.update', ":model_id") }}";
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
                                window.location.href = '{{ route('prefixdetail.index') }}';
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
            title: "Are you sure to delete this Prefix Details?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('prefixdetail.destroy', ":model_id") }}";

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
