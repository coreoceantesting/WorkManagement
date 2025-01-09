<x-admin.layout>
    <x-slot name="title">Physical Milestones</x-slot>
    <x-slot name="heading">Physical Milestones</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Physical Milestone</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectname" name="projectname" required>
                                        <option value="" disabled selected>Select Project</option>
                                        @foreach($project as $projects)
                                            <option value="{{ $projects->id }}" {{ old('projects') == $projects->id ? 'selected' : '' }}>
                                                {{ $projects->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectname_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="workname">Work Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="workname" name="workname" required>
                                        <option value="" disabled selected>Select Work</option>
                                        @foreach($workname as $worknames)
                                            <option value="{{ $worknames->id }}" {{ old('worknames') == $worknames->id ? 'selected' : '' }}>
                                                {{ $worknames->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workname_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="start_date">Start Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="start_date" name="start_date" type="date" >
                                    <span class="text-danger is-invalid start_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="end_date">End Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="end_date" name="end_date" type="date" >
                                    <span class="text-danger is-invalid end_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="amount">Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter amount" >
                                    <span class="text-danger is-invalid amount_err"></span>
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
                            <h4 class="card-title">Edit Physical Milestones</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                          <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="projectname" name="projectname" required>
                                        <option value="" disabled selected>Select Project</option>
                                        @foreach($project as $projects)
                                            <option value="{{ $projects->id }}" {{ old('projects') == $projects->id ? 'selected' : '' }}>
                                                {{ $projects->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid projectname_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="workname">Work Name<span class="text-danger">*</span></label>
                                    <select class="form-control" id="workname" name="workname" required>
                                        <option value="" disabled selected>Select Work</option>
                                        @foreach($workname as $worknames)
                                            <option value="{{ $worknames->id }}" {{ old('worknames') == $worknames->id ? 'selected' : '' }}>
                                                {{ $worknames->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid workname_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="start_date">Start Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="start_date" name="start_date" type="date" >
                                    <span class="text-danger is-invalid start_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="end_date">End Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="end_date" name="end_date" type="date" >
                                    <span class="text-danger is-invalid end_date_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="amount">Amount<span class="text-danger">*</span></label>
                                    <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter amount" >
                                    <span class="text-danger is-invalid amount_err"></span>
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
                                        <th>Project Name</th>
                                        <th>Work Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($physicalmilestone as $list)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list?->ProjectName}}</td>
                                        <td>{{ $list?->WorkName}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->end_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->amount}}</td>
                                        
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
            url: '{{ route('physicalmilestone.store') }}',
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
                            window.location.href = '{{ route('physicalmilestone.index') }}';
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
        var url = "{{ route('physicalmilestone.edit', ':model_id') }}";
        url = url.replace(':model_id', model_id);
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"  
            },
            success: function(data, textStatus, jqXHR) {
                if (data.result === 1) {
                    $("#editContainer").show();
                    $("#editForm input[name='edit_model_id']").val(data.physicalmilestones.id);
                    $("#editForm select[name='projectname']").val(data.physicalmilestones.projectname); 
                    $("#editForm select[name='workname']").val(data.physicalmilestones.workname); 
                    $("#editForm input[name='start_date']").val(data.physicalmilestones.start_date);
                    $("#editForm input[name='end_date']").val(data.physicalmilestones.end_date);
                    $("#editForm input[name='amount']").val(data.physicalmilestones.amount);
                    
                } else {
                    alert(data.message || "Error fetching data.");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
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
            var url = "{{ route('physicalmilestone.update', ":model_id") }}";
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
                                window.location.href = '{{ route('physicalmilestone.index') }}';
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
                var url = "{{ route('physicalmilestone.destroy', ":model_id") }}";

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
