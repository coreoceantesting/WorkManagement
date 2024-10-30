<x-admin.layout>
    <x-slot name="title">Financial Year</x-slot>
    <x-slot name="heading">Financial Year</x-slot>
    @push('styles')
        <style>
            .size-checkbox {
                width: 1.7rem;
                height: 1.7rem;
            }
        </style>
    @endpush


    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title">Add Financial Year</h4>
                </header>
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">From Date<span class="text-danger">*</span></label>
                                <input class="form-control title" id="from_date" name="from_date" type="date" placeholder="Enter From Date">
                                <span class="text-danger invalid from_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">To Date<span class="text-danger">*</span></label>
                                <input class="form-control title" id="to_date" name="to_date" type="date" placeholder="Enter To Date">
                                <span class="text-danger invalid to_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="title">Title <span class="text-danger">*</span></label>
                                <input class="form-control" id="title" name="title" type="text" placeholder="Title" readonly>
                                <span class="text-danger invalid title_err"></span>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label class="col-form-check-label" for="formCheck8">
                                    Is Active
                                </label>
                                <input class="form-check-input size-checkbox" type="checkbox" id="formCheck8" name="is_active" checked="" value="1">
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
                <section class="card">
                    <header class="card-header">
                        <h4 class="card-title">Edit Financial Year</h4>
                    </header>

                    <div class="card-body py-2">

                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">From Date<span class="text-danger">*</span></label>
                                <input class="form-control title1" id="from_date1" name="from_date" type="date" placeholder="Enter From Date">
                                <span class="text-danger invalid from_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">To Date<span class="text-danger">*</span></label>
                                <input class="form-control title1" id="to_date1" name="to_date" type="date" placeholder="Enter To Date">
                                <span class="text-danger invalid to_date_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="title">Title <span class="text-danger">*</span></label>
                                <input class="form-control" id="title" name="title" type="text" placeholder="Title" readonly>
                                <span class="text-danger invalid title_err"></span>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label class="col-form-check-label" for="formCheck8">
                                    Is Active
                                </label>
                                <input class="form-check-input size-checkbox" type="checkbox" id="is_active" name="is_active" checked="" value="1">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="editSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </section>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @can('financial_year.create')
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
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($financial_years as $financial_year)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $financial_year->from_date }}</td>
                                        <td>{{ $financial_year->to_date }}</td>
                                        <td>{{ $financial_year->title }}</td>
                                        <td>{{ $financial_year->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            @can('financial_year.edit')
                                                <button class="edit-element btn btn-secondary px-2 py-1" title="Edit Financial Year" data-id="{{ $financial_year->id }}"><i data-feather="edit"></i></button>
                                            @endcan
                                            @can('financial_year.delete')
                                                <button class="btn btn-danger rem-element px-2 py-1" title="Delete Financial Year" data-id="{{ $financial_year->id }}"><i data-feather="trash-2"></i> </button>
                                            @endcan
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
            url: '{{ route('financial_year.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('financial_year.index') }}';
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
        var url = "{{ route('financial_year.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                if (!data.error) {
                    $("#editForm input[name='edit_model_id']").val(data.financialYear.id);
                    $("#editForm input[name='from_date']").val(data.financialYear.from_date);
                    $("#editForm input[name='to_date']").val(data.financialYear.to_date);
                    $("#editForm input[name='title']").val(data.financialYear.title);

                    if (data.financialYear.is_active == '1') {
                        $('#is_active').prop('checked', true);
                        $('.size-checkbox').val('1')
                    } else {
                        $('#is_active').prop('checked', false);
                        $('.size-checkbox').val('0')
                    }

                } else {
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
            var url = "{{ route('financial_year.update', ':model_id') }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('financial_year.index') }}';
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
                title: "Are you sure to delete this Financial Year?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('financial_year.destroy', ':model_id') }}";

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

<script>
    $(".title").change(function() {

        var from_date = $("input[name=from_date]").val();
        var to_date = $("input[name=to_date]").val();

        // alert(from_date);

        var fromdateArray = from_date.split('-');
        var from_date_year = fromdateArray[0];

        var todateArray = to_date.split('-');
        var to_date_year = todateArray[0];

        var Title = 'FY' + from_date_year + '-' + to_date_year;
        $("input[name=title]").val(Title);
    });

    $(".title1").change(function() {

        var from_date = $("#from_date1").val();
        var to_date = $("#to_date1").val();

        var fromdateArray = from_date.split('-');
        var from_date_year = fromdateArray[0];

        var todateArray = to_date.split('-');
        var to_date_year = todateArray[0];

        var Title = 'FY' + from_date_year + '-' + to_date_year;
        $("input[name=title]").val(Title);
    });

    $(document).ready(function() {
        $(".size-checkbox").change(function() {
            if ($(this).prop('checked')) {
                $('.size-checkbox').val('1')
            } else {
                $('.size-checkbox').val('0')
            }
        });
    });
</script>
