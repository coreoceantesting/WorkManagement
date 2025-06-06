<x-admin.layout>
    <x-slot name="title">BID Entry and BID Finalization</x-slot>
    <x-slot name="heading">BID Entry and BID Finalization</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add BID Entry and BID Finalization</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bidid">BID ID<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bidid" name="bidid" type="text" placeholder="Enter BID ID">
                                    <span class="text-danger is-invalid bidid_err"></span>
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
                                    <label class="col-form-label" for="work_code_no">Tendor No<span class="text-danger">*</span></label>
                                    <select class="form-control" id="work_code_no" name="work_code_no">
                                        <option value="">-- select --</option>
                                        @foreach($tenderentry as $entry)
                                        <option value="{{ $entry->id }}">{{ $entry->work_code_no }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid work_code_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="biddername">Bidder Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="biddername" name="biddername" type="text" placeholder="Enter Bidder Name">
                                    <span class="text-danger is-invalid biddername_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tech_evaluation_status">Technical Evaluation Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tech_evaluation_status" name="tech_evaluation_status">
                                        <option value="">---Select---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid tech_evaluation_status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_evaluation_status">Financial Evaluation Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="financial_evaluation_status" name="financial_evaluation_status">
                                        <option value="">---Select---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid financial_evaluation_status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rank">Rank<span class="text-danger">*</span></label>
                                    <input class="form-control" id="rank" name="rank" type="text" placeholder="Enter Rank">
                                    <span class="text-danger is-invalid rank_err"></span>
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
                            <h4 class="card-title">Edit BID Entry and BID Finalization</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="bidid">BID ID<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bidid" name="bidid" type="text" placeholder="Enter BID ID">
                                    <span class="text-danger is-invalid bidid_err"></span>
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
                                    <label class="col-form-label" for="work_code_no">Tendor No<span class="text-danger">*</span></label>
                                    <select class="form-control" id="work_code_no" name="work_code_no">
                                        <option value="">-- select --</option>
                                        @foreach($tenderentry as $entry)
                                        <option value="{{ $entry->id }}">{{ $entry->work_code_no }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid work_code_no_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="biddername">Bidder Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="biddername" name="biddername" type="text" placeholder="Enter Bidder Name">
                                    <span class="text-danger is-invalid biddername_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="tech_evaluation_status">Technical Evaluation Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="tech_evaluation_status" name="tech_evaluation_status">
                                        <option value="">---Select---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid tech_evaluation_status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_evaluation_status">Financial Evaluation Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="financial_evaluation_status" name="financial_evaluation_status">
                                        <option value="">---Select---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid financial_evaluation_status_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="rank">Rank<span class="text-danger">*</span></label>
                                    <input class="form-control" id="rank" name="rank" type="text" placeholder="Enter Rank">
                                    <span class="text-danger is-invalid rank_err"></span>
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
                                        <th>BID ID</th>
                                        <th>Project Name</th>
                                        <th>Tender Number</th>
                                        <th>Bidder Name</th>
                                        <th>Technical Evaluation Status</th>
                                        <th>Financial Evaluation Status</th>
                                        <th>Rank</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BidList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->bidid }}</td>
                                            <td>{{ $list?->projectinfoData?->projectnameenglish}}</td>
                                            <td>{{ $list?->tenderData?->work_code_no}}</td>
                                            <td>{{ $list->biddername }}</td>
                                            <td>
                                                @if($list->tech_evaluation_status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>
                                                @if($list->financial_evaluation_status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>{{ $list->rank }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit BID" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete BID" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('bid.store') }}',
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
                            window.location.href = '{{ route('bid.index') }}';
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
        var url = "{{ route('bid.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.bid.id);
                    $("#editForm input[name='bidid']").val(data.bid.bidid);
                    $("#editForm input[name='biddername']").val(data.bid.biddername);
                    $("#editForm input[name='rank']").val(data.bid.rank);
                    $("#editForm select[name='projectname']").val(data.bid.projectname);
                    $("#editForm select[name='work_code_no']").val(data.bid.work_code_no);
                    $("#editForm select[name='tech_evaluation_status']").val(data.bid.tech_evaluation_status);
                    $("#editForm select[name='financial_evaluation_status']").val(data.bid.financial_evaluation_status);

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
            var url = "{{ route('bid.update', ":model_id") }}";
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
                                window.location.href = '{{ route('bid.index') }}';
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
                var url = "{{ route('bid.destroy', ":model_id") }}";

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
