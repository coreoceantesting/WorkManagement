<x-admin.layout>
    <x-slot name="title">Tender Entry Details</x-slot>
    <x-slot name="heading">Tender Entry Details</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header"><h4 class="card-title">Add Tender Entry Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectname" name="projectname">
                                        <option value="">-- select --</option>
                                        @foreach($projectinfo as $project)
                                        <option value="{{ $project->id }}">{{ $project->projectnameenglish }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectnameenglish_err"></span>
                            </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="workname">Work Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="workname" name="workname">
                                        <option value="">-- select --</option>
                                        @foreach($workdefination as $work)
                                        <option value="{{ $work->id }}">{{ $work->workname }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workname_err"></span>
                            </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="vendorname">Vendor Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="vendorname" name="vendorname">
                                        <option value="">-- select --</option>
                                        @foreach($vendor as $data)
                                        <option value="{{ $data->id }}">{{ $data->vendorname }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vendorname_err"></span>
                            </div>

                            <div class="col-md-4">
                                    <label class="col-form-label" for="tender_accepted_cost">Tender Accepted Cost<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tender_accepted_cost" name="tender_accepted_cost" type="text" placeholder="Enter Tender Accepted Cost">
                                    <span class="text-danger is-invalid tender_accepted_cost_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_code_no">Work Code No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_code_no" name="work_code_no" type="text" placeholder="Enter Work Code No">
                                    <span class="text-danger is-invalid work_code_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tenderentry">Tender Entry Without MB<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tenderentry" name="tenderentry">
                                        <option value="">---Select---</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid tenderentry_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgetdate">Budget Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="budgetdate" name="budgetdate" type="date" placeholder="Enter Budget Date">
                                    <span class="text-danger is-invalid budgetdate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="proposalcost">Proposal Cost(with GST)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="proposalcost" name="proposalcost" type="text" placeholder="Enter Proposal Cost">
                                    <span class="text-danger is-invalid proposalcost_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tendercost">Tender Cost(with GST)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tendercost" name="tendercost" type="text" placeholder="Enter Tender Cost">
                                    <span class="text-danger is-invalid tendercost_err"></span>
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
                            <h4 class="card-title">Edit Tender Entry Details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectname" name="projectname">
                                        <option value="">-- select --</option>
                                        @foreach($projectinfo as $project)
                                        <option value="{{ $project->id }}">{{ $project->projectnameenglish }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectnameenglish_err"></span>
                            </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="workname">Work Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="workname" name="workname">
                                        <option value="">-- select --</option>
                                        @foreach($workdefination as $work)
                                        <option value="{{ $work->id }}">{{ $work->workname }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workname_err"></span>
                            </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="vendorname">Vendor Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="vendorname" name="vendorname">
                                        <option value="">-- select --</option>
                                        
                                    </select>
                                    <span class="text-danger is-invalid vendorname_err"></span>
                            </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tender_accepted_cost">Tender Accepted Cost<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tender_accepted_cost" name="tender_accepted_cost" type="text" placeholder="Enter Tender Accepted Cost">
                                    <span class="text-danger is-invalid tender_accepted_cost_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_code_no">Work Code No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_code_no" name="work_code_no" type="text" placeholder="Enter Work Code No">
                                    <span class="text-danger is-invalid work_code_no_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tenderentry">Tender Entry Without MB<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tenderentry" name="tenderentry">
                                        <option value="">---Select---</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid tenderentry_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="budgetdate">Budget Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="budgetdate" name="budgetdate" type="date" placeholder="Enter Budget Date">
                                    <span class="text-danger is-invalid budgetdate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="proposalcost">Proposal Cost(with GST)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="proposalcost" name="proposalcost" type="text" placeholder="Enter Proposal Cost">
                                    <span class="text-danger is-invalid proposalcost_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="tendercost">Tender Cost(with GST)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tendercost" name="tendercost" type="text" placeholder="Enter Tender Cost">
                                    <span class="text-danger is-invalid tendercost_err"></span>
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

        <div class="container">
        <form id="searchForm" action="{{ route('search.results') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                        <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                        <select class="form-control" id="projectname" name="projectname">
                            <option value="">-- select --</option>
                            @foreach($projectinfo as $project)
                            <option value="{{ $project->id }}">{{ $project->projectnameenglish }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger is-invalid projectnameenglish_err"></span>
                </div>
                <div class="col-md-4">
                        <label class="col-form-label" for="workname">Work Name<span class="text-danger">*</span></label>
                        <select class="form-control" id="workname" name="workname">
                            <option value="">-- select --</option>
                            @foreach($workdefination as $work)
                            <option value="{{ $work->id }}">{{ $work->workname }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger is-invalid workname_err"></span>
                </div>
                <div class="col-md-4">
                        <label class="col-form-label" for="vendorname">Vendor Name<span class="text-danger">*</span></label>
                        <select class="form-control" id="vendorname" name="vendorname">
                            <option value="">-- select --</option>
                            @foreach($vendor as $vendors)
                            <option value="{{ $vendors->id }}">{{ $vendors->vendorname }}</option>
                            @endforeach


                        </select>
                        <span class="text-danger is-invalid vendorname_err"></span>
                </div>
            </div>
            <button id="searchButton" class="btn btn-primary mt-3" type="submit">Search</button>
        </form>
        <br>

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
                                        <th>Project Name</th>
                                        <th>Work Name</th>
                                        <th>Vendor Name</th>
                                        <th>Tender Accepted Cost</th>
                                        <th>Work Code No</th>
                                        <th>Tender Entry Without MB</th>
                                        <th>Budget Date</th>
                                        <th>Proposal Cost(with GST)</th>
                                        <th>Tender Cost(with GST)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenderentry as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list?->projectinfoData?->projectnameenglish }}</td>
                                            <td>{{ $list?->workdefinationData?->workname}} </td> 
                                            <td>{{ $list?->vendorData?->vendorname}}</td>
                                            <td>{{ $list->tender_accepted_cost}}</td>
                                            <td>{{ $list->work_code_no}}</td>
                                            <td>{{ $list->tenderentry}}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->budgetdate)->format('d-m-Y') }}</td>
                                            <td>{{ $list->proposalcost}}</td>
                                            <td>{{ $list->tendercost}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Work Definition" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
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
            url: '{{ route('tenderentry.store') }}',
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
                            window.location.href = '{{ route('tenderentry.index') }}';
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
        var url = "{{ route('tenderentry.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.tenderentry.id);
                    $("#editForm input[name='tender_accepted_cost']").val(data.tenderentry.tender_accepted_cost);
                    $("#editForm input[name='work_code_no']").val(data.tenderentry.work_code_no);
                    $("#editForm select[name='tenderentry']").val(data.tenderentry.tenderentry);
                    $("#editForm input[name='budgetdate']").val(data.tenderentry.budgetdate);
                    $("#editForm input[name='proposalcost']").val(data.tenderentry.proposalcost);
                    $("#editForm input[name='tendercost']").val(data.tenderentry.tendercost);
                    $("#editForm select[name='projectname']").html(data.mastersHtml);
                    $("#editForm select[name='vendorname']").html(data.mastersHtml1);
                    $("#editForm select[name='workname']").html(data.mastersHtml2);
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
            var url = "{{ route('tenderentry.update', ":model_id") }}";
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
                                window.location.href = '{{ route('tenderentry.index') }}';
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
                var url = "{{ route('tenderentry.destroy', ":model_id") }}";

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
<!-- 
<script>
$(document).ready(function() {
    // Trigger search when the Search button is clicked
    $('#searchButton').on('click', function() {
        var formData = $('#searchForm').serialize();  // Serialize form data

        $.ajax({
            url: '{{ route('search.results') }}',  // URL for the AJAX request
            method: 'GET',
            data: formData,  // Send serialized form data
            success: function(response) {
                // Process the response data (results)
                var resultsHtml = '<ul>';
                response.forEach(function(item) {
                    // Modify this based on the fields you want to display
                    resultsHtml += '<li>' + item.projectnameenglish + ' - ' + item.workname + ' - ' + item.vendorname + '</li>';
                });
                resultsHtml += '</ul>';

                // Display results in the #results div
                $('#results').html(resultsHtml);
            }
        });
    });
});
</script> -->
