<x-admin.layout>
    <x-slot name="title">Work Definition</x-slot>
    <x-slot name="heading">Work Definition</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <!-- protected $fillable = ['workcode', 'projectname','workname','department','typeofwork','proposalnumber','categoryofwork','probablecompletiondate','subtype','ip_address']; -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header"><h4 class="card-title">Add Work Definition</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="code">Work Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="code" name="workcode" type="text" placeholder="Enter Work Code">
                                    <span class="text-danger is-invalid code_err"></span>
                                </div>
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
                                    <input class="form-control" id="workname" name="workname" type="text" placeholder="Enter Work Name">
                                    <span class="text-danger is-invalid workname_err"></span>
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
                                    <label class="col-form-label" for="typeofwork">Type of Work<span class="text-danger">*</span></label>
                                    <input class="form-control" id="typeofwork" name="typeofwork" type="text" placeholder="Enter Type of Work">
                                    <span class="text-danger is-invalid typeofwork_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="proposalnumber">proposal Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="proposalnumber" name="proposalnumber" type="text" placeholder="Enter Proposal Number">
                                    <span class="text-danger is-invalid proposalnumber_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="categoryofwork">Category of Work<span class="text-danger">*</span></label>
                                    <select class="form-control" id="categoryofwork" name="categoryofwork">
                                        <option value="">-- select --</option>
                                        @foreach($categoryofwork as $work)
                                        <option value="{{ $work->id }}">{{ $work->cow_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid categoryofwork_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="probablecompletiondate">Probable Completion Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="probablecompletiondate" name="probablecompletiondate" type="date" placeholder="Enter Probable Completion Date">
                                    <span class="text-danger is-invalid probablecompletiondate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="probablecommencementdate">Probable Completion Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="probablecommencementdate" name="probablecommencementdate" type="date" placeholder="Enter Probable Completion Date">
                                    <span class="text-danger is-invalid probablecommencementdate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectphase">Project Phase<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectphase" name="projectphase">
                                        <option value="">-- select --</option>
                                        @foreach($projects as $proj)
                                        <option value="{{ $proj->id }}">{{ $proj->phase}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectphase_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="workdone">Work Done<span class="text-danger">*</span></label>
                                    <input class="form-control" id="workdone" name="workdone" type="text" placeholder="Enter Work Done">
                                    <span class="text-danger is-invalid workdone_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="subtype">Subtype of Work<span class="text-danger">*</span></label>
                                    <input class="form-control" id="subtype" name="subtype" type="text" placeholder="Enter Subtype of Work">
                                    <span class="text-danger is-invalid subtype_err"></span>
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
                                    <label class="col-form-label" for="workcode">Work Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="code" name="workcode" type="text" placeholder="Enter Work Code">
                                    <span class="text-danger is-invalid code_err"></span>
                                </div>
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
                                    <input class="form-control" id="workname" name="workname" type="text" placeholder="Enter Work Name">
                                    <span class="text-danger is-invalid workname_err"></span>
                                </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="department">Select Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="">-- select --</option>
                                        @foreach($projectinfo as $project)
                                        <option value="{{ $project->id  }}">{{ $project->department}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                            </div>

                            <div class="col-md-4">
                                    <label class="col-form-label" for="typeofwork">Type of Work<span class="text-danger">*</span></label>
                                    <input class="form-control" id="typeofwork" name="typeofwork" type="text" placeholder="Enter Type of Work">
                                    <span class="text-danger is-invalid typeofwork_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="proposalnumber">proposal Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="proposalnumber" name="proposalnumber" type="text" placeholder="Enter Proposal Number">
                                    <span class="text-danger is-invalid proposalnumber_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="categoryofwork">Category of Work<span class="text-danger">*</span></label>
                                    <select class="form-control" id="categoryofwork" name="categoryofwork">
                                        <option value="">-- select --</option>
                                        @foreach($categoryofwork as $work)
                                        <option value="{{ $work->id }}">{{ $work->cow_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid categoryofwork_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="probablecompletiondate">Probable Completion Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="probablecompletiondate" name="probablecompletiondate" type="date" placeholder="Enter Probable Completion Date">
                                    <span class="text-danger is-invalid probablecompletiondate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="probablecommencementdate">Probable Commencement Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="probablecommencementdate" name="probablecommencementdate" type="date" placeholder="Enter Probable Completion Date">
                                    <span class="text-danger is-invalid probablecommencementdate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectphase">Project Phase<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectphase" name="projectphase">
                                        <option value="">-- select --</option>
                                        @foreach($projects as $proj)
                                        <option value="{{ $proj->id }}">{{ $proj->phase}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectphase_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="workdone">Work Done<span class="text-danger">*</span></label>
                                    <input class="form-control" id="workdone" name="workdone" type="text" placeholder="Enter Work Done">
                                    <span class="text-danger is-invalid workdone_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="subtype">Subtype of Work<span class="text-danger">*</span></label>
                                    <input class="form-control" id="subtype" name="subtype" type="text" placeholder="Enter Subtype of Work">
                                    <span class="text-danger is-invalid subtype_err"></span>
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
                                        <th>Work Code</th>
                                        <th>Project Name</th>
                                        <th>Work Name</th>
                                        <th>Executing Department</th>
                                        <th>Type of Work</th>
                                        <th>Proposal Number</th>
                                        <th>Category of Work</th>
                                        <th>Probable Completion Date</th>
                                        <th>Probable Commencement Date</th>
                                        <th>Project Phase</th>
                                        <th>Work Done</th>
                                        <th>Subtype of Work</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workdefinitionList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->workcode}}</td>
                                            <td>{{ $list?->projectinfoData?->projectnameenglish }}</td>
                                            <td>{{ $list->workname}} </td>
                                            <td>{{ $list?->departmentName?->department_name}}</td>
                                            <td>{{ $list->typeofwork}}</td>
                                            <td>{{ $list->proposalnumber}}</td>
                                            <td>{{ $list->categoryofworkData->cow_name}}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->probablecompletiondate)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->probablecommencementdate)->format('d-m-Y') }}</td>
                                            <td>{{ $list->proData->phase}}</td>
                                            <td>{{ $list->workdone}}</td>
                                            <td>{{ $list->subtype}}</td>
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
            url: '{{ route('workdefinition.store') }}',
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
                            window.location.href = '{{ route('workdefinition.index') }}';
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
        var url = "{{ route('workdefinition.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.workdefinition.id);
                    $("#editForm input[name='workcode']").val(data.workdefinition.workcode);
                    $("#editForm input[name='workname']").val(data.workdefinition.workname);
                    $("#editForm input[name='typeofwork']").val(data.workdefinition.typeofwork);
                    $("#editForm input[name='proposalnumber']").val(data.workdefinition.proposalnumber);
                    $("#editForm input[name='probablecompletiondate']").val(data.workdefinition.probablecompletiondate);
                    $("#editForm input[name='probablecommencementdate']").val(data.workdefinition.probablecommencementdate);
                    $("#editForm input[name='workdone']").val(data.workdefinition.workdone);
                    $("#editForm input[name='subtype']").val(data.workdefinition.subtype);
                    $("#editForm select[name='projectname']").html(data.mastersHtml);
                    $("#editForm select[name='department']").html(data.mastersHtml1);
                    $("#editForm select[name='projectphase']").html(data.mastersHtml2);
                    $("#editForm select[name='categoryofwork']").html(data.mastersHtml3);
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
            var url = "{{ route('workdefinition.update', ":model_id") }}";
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
                                window.location.href = '{{ route('workdefinition.index') }}';
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
                var url = "{{ route('workdefinition.destroy', ":model_id") }}";

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
    $(document).ready(function () {
        // Event listener for the Project dropdown change
        $('#projectname').on('change', function () {
            var ProjectID = $(this).val(); // Get the selected Project ID
            
            // Reset the Department dropdown and show a loading message
            $('#department').html('<option value="">Loading...</option>');

            // Check if a Project is selected
            if (ProjectID) {
                $.ajax({
                    url: '/workdefinition/' + ProjectID, // Endpoint to fetch departments
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data); // Corrected console log statement
                        
                        // Clear the department dropdown and add default option
                        $('#department').empty().append('<option value="">-- Select Department --</option>');

                        // Populate the department dropdown with new options
                        $.each(data, function (key, department) {
                            $('#department').append(
                                '<option value="' + department.id + '">' + department.department_name + '</option>'
                            );
                        });
                    },
                    error: function () {
                        // Display error message if departments fail to load
                        $('#department').html('<option value="">Error loading departments</option>');
                    }
                });
            } else {
                // Reset the Department dropdown if no Project is selected
                $('#department').html('<option value="">-- Select Department --</option>');
            }
        });
    });
</script>