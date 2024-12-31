<x-admin.layout>
    <x-slot name="title">Tender Execution and Award</x-slot>
    <x-slot name="heading">Tender Execution and Award</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Tender Execution and Award</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department<span class="text-danger">*</span></label>
                                    <input class="form-control" id="department" name="department" type="text" placeholder="Enter Department">
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectname" name="projectname" type="text" placeholder="Enter Project Name">
                                    <span class="text-danger is-invalid projectname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution">Resolution<span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution" name="resolution" type="text" placeholder="Enter Resolution">
                                    <span class="text-danger is-invalid resolution_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution_date">Resolution Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution_date" name="resolution_date" type="date" >
                                    <span class="text-danger is-invalid resolution_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pre_bid_meeting_date">Pre Bid Meeting Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pre_bid_meeting_date" name="pre_bid_meeting_date" type="date" >
                                    <span class="text-danger is-invalid pre_bid_meeting_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="meeting_location">Meeting Location<span class="text-danger">*</span></label>
                                    <input class="form-control" id="meeting_location" name="meeting_location" type="text" placeholder="Enter Meeting Location">
                                    <span class="text-danger is-invalid meeting_location_err"></span>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="col-form-label" for="issue_from_date">Issue From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="issue_from_date" name="issue_from_date" type="date" >
                                    <span class="text-danger is-invalid issue_from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="issue_till_date">Issue Till Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="issue_till_date" name="issue_till_date" type="date" >
                                    <span class="text-danger is-invalid issue_till_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="publish_date">Publish Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="publish_date" name="publish_date" type="date" >
                                    <span class="text-danger is-invalid publish_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="technical_bid_open_date">Technical BID Open Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="technical_bid_open_date" name="technical_bid_open_date" type="date" >
                                    <span class="text-danger is-invalid technical_bid_open_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_bid_open_date">Financial BID Open Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="financial_bid_open_date" name="financial_bid_open_date" type="date" >
                                    <span class="text-danger is-invalid financial_bid_open_date_err"></span>
                                </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="tender_category">Tender Category<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tender_category" name="tender_category" type="text" placeholder="Enter Tender Category">
                                    <span class="text-danger is-invalid tender_category_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="validity_of_tender">Validity of Tender(In Days)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="validity_of_tender" name="validity_of_tender" type="text" placeholder="Enter Validity of Tender(In Days)">
                                    <span class="text-danger is-invalid validity_of_tender_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_guarantee">Bank Gaurantee<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_guarantee" name="bank_guarantee" type="text" placeholder="Enter Bank Gaurantee">
                                    <span class="text-danger is-invalid bank_guarantee_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="addition_performance_sd">Additional Performance SD<span class="text-danger">*</span></label>
                                    <input class="form-control" id="addition_performance_sd" name="addition_performance_sd" type="text" placeholder="Enter Additional Performance SD">
                                    <span class="text-danger is-invalid addition_performance_sd_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="provisional_sum">Provisional Sum<span class="text-danger">*</span></label>
                                    <input class="form-control" id="provisional_sum" name="provisional_sum" type="text" placeholder="Enter Provisional Sum">
                                    <span class="text-danger is-invalid provisional_sum_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="devaluation_percentage">Devaluation Percentage<span class="text-danger">*</span></label>
                                    <input class="form-control" id="devaluation_percentage" name="devaluation_percentage" type="text" placeholder="Enter Devaluation Percentage">
                                    <span class="text-danger is-invalid devaluation_percentage_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upload_document">Upload Document </label>
                                    <input class="form-control" id="upload_document" name="upload_document" type="file">
                                    <span class="text-danger is-invalid upload_document_err"></span>
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
                            <h4 class="card-title">Edit Tender Execution and Award</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department<span class="text-danger">*</span></label>
                                    <input class="form-control" id="department" name="department" type="text" placeholder="Enter Department">
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectname">Project Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectname" name="projectname" type="text" placeholder="Enter Project Name">
                                    <span class="text-danger is-invalid projectname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution">Resolution<span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution" name="resolution" type="text" placeholder="Enter Resolution">
                                    <span class="text-danger is-invalid resolution_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="resolution_date">Resolution Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="resolution_date" name="resolution_date" type="date" >
                                    <span class="text-danger is-invalid resolution_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pre_bid_meeting_date">Pre Bid Meeting Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pre_bid_meeting_date" name="pre_bid_meeting_date" type="date" >
                                    <span class="text-danger is-invalid pre_bid_meeting_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="meeting_location">Meeting Location<span class="text-danger">*</span></label>
                                    <input class="form-control" id="meeting_location" name="meeting_location" type="text" placeholder="Enter Meeting Location">
                                    <span class="text-danger is-invalid meeting_location_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="issue_from_date">Issue From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="issue_from_date" name="issue_from_date" type="date" >
                                    <span class="text-danger is-invalid issue_from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="issue_till_date">Issue Till Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="issue_till_date" name="issue_till_date" type="date" >
                                    <span class="text-danger is-invalid issue_till_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="publish_date">Publish Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="publish_date" name="publish_date" type="date" >
                                    <span class="text-danger is-invalid publish_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="technical_bid_open_date">Technical BID Open Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="technical_bid_open_date" name="technical_bid_open_date" type="date" >
                                    <span class="text-danger is-invalid technical_bid_open_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="financial_bid_open_date">Financial BID Open Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="financial_bid_open_date" name="financial_bid_open_date" type="date" >
                                    <span class="text-danger is-invalid financial_bid_open_date_err"></span>
                                </div>
                            <div class="col-md-4">
                                    <label class="col-form-label" for="tender_category">Tender Category<span class="text-danger">*</span></label>
                                    <input class="form-control" id="tender_category" name="tender_category" type="text" placeholder="Enter Tender Category">
                                    <span class="text-danger is-invalid tender_category_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="validity_of_tender">Validity of Tender(In Days)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="validity_of_tender" name="validity_of_tender" type="text" placeholder="Enter Validity of Tender(In Days)">
                                    <span class="text-danger is-invalid validity_of_tender_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="bank_guarantee">Bank Gaurantee<span class="text-danger">*</span></label>
                                    <input class="form-control" id="bank_guarantee" name="bank_guarantee" type="text" placeholder="Enter Bank Gaurantee">
                                    <span class="text-danger is-invalid bank_guarantee_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="addition_performance_sd">Additional Performance SD<span class="text-danger">*</span></label>
                                    <input class="form-control" id="addition_performance_sd" name="addition_performance_sd" type="text" placeholder="Enter Additional Performance SD">
                                    <span class="text-danger is-invalid addition_performance_sd_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="provisional_sum">Provisional Sum<span class="text-danger">*</span></label>
                                    <input class="form-control" id="provisional_sum" name="provisional_sum" type="text" placeholder="Enter Provisional Sum">
                                    <span class="text-danger is-invalid provisional_sum_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="devaluation_percentage">Devaluation Percentage<span class="text-danger">*</span></label>
                                    <input class="form-control" id="devaluation_percentage" name="devaluation_percentage" type="text" placeholder="Enter Devaluation Percentage">
                                    <span class="text-danger is-invalid devaluation_percentage_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upload_document">Upload Document </label>
                                    <input class="form-control" id="upload_document" name="upload_document" type="file">
                                    <a id="upload_document_file" href="" target="_blank" style="display:block;">View Document</a>
                                    <span class="text-danger is-invalid upload_document_err"></span>
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
                                        <th>Department</th>
                                        <th>Project Name</th>
                                        <th>Resolution</th>
                                        <th>Resolution Date</th>
                                        <th>Pre BID Meeting Date</th>
                                        <th>Meeting Location</th>
                                        <th>Issue From Date</th>
                                        <th>Issue Till Date</th>
                                        <th>Publish Date</th>
                                        <th>Technical BID Open Date</th>
                                        <th>Financial BID Open Date</th>
                                        <th>Tender Category</th>
                                        <th>Validity of Tender(in Days)</th>
                                        <th>Bank Gaurantee</th>
                                        <th>Additional Performance SD</th>
                                        <th>Provisional Sum</th>
                                        <th>Devaluation Percentage</th>
                                        <th>Upload Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenderexecution as $list)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list?->department}}</td>
                                        <td>{{ $list?->projectname}}</td>
                                        <td>{{ $list->resolution}} </td> 
                                        <td>{{ \Carbon\Carbon::parse($list->resolution_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->pre_bid_meeting_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->meeting_location}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->issue_from_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->issue_till_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->publish_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->technical_bid_open_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->financial_bid_open_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list->tender_category}} </td>
                                        <td>{{ $list?->validity_of_tender}}</td>
                                        <td>{{ $list->bank_guarantee}} </td>
                                        <td>{{ $list?->addition_performance_sd}}</td>
                                        <td>{{ $list->provisional_sum}} </td>
                                        <td>{{ $list?->devaluation_percentage}}</td>
                                        <td>
                                            @if($list->upload_document)
                                                <a href="{{ asset('storage/' . $list->upload_document) }}" target="_blank">View Document</a>
                                            @else
                                                No Document Available
                                            @endif
                                        </td>
                                        
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit ward" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete ward" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('tenderexecution.store') }}',
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
                            window.location.href = '{{ route('tenderexecution.index') }}';
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
        var url = "{{ route('tenderexecution.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.tenderexecution.id);
                    $("#editForm input[name='department']").val(data.tenderexecution.department);
                    $("#editForm input[name='projectname']").val(data.tenderexecution.projectname);
                    $("#editForm input[name='resolution']").val(data.tenderexecution.resolution);
                    $("#editForm input[name='resolution_date']").val(data.tenderexecution.resolution_date);
                    $("#editForm input[name='pre_bid_meeting_date']").val(data.tenderexecution.pre_bid_meeting_date);
                    $("#editForm input[name='meeting_location']").val(data.tenderexecution.meeting_location);
                    $("#editForm input[name='issue_from_date']").val(data.tenderexecution.issue_from_date);
                    $("#editForm input[name='issue_till_date']").val(data.tenderexecution.issue_till_date);
                    $("#editForm input[name='publish_date']").val(data.tenderexecution.publish_date);
                    $("#editForm input[name='technical_bid_open_date']").val(data.tenderexecution.technical_bid_open_date);
                    $("#editForm input[name='financial_bid_open_date']").val(data.tenderexecution.financial_bid_open_date);
                    $("#editForm input[name='tender_category']").val(data.tenderexecution.tender_category);
                    $("#editForm input[name='validity_of_tender']").val(data.tenderexecution.validity_of_tender);
                    $("#editForm input[name='bank_guarantee']").val(data.tenderexecution.bank_guarantee);
                    $("#editForm input[name='addition_performance_sd']").val(data.tenderexecution.addition_performance_sd);
                    $("#editForm input[name='provisional_sum']").val(data.tenderexecution.provisional_sum);
                    $("#editForm input[name='devaluation_percentage']").val(data.tenderexecution.devaluation_percentage);
                    var baseUrl = "{{ asset('storage') }}"; 
                    if (data.tenderexecution.upload_document) {
                    var documentUrl = baseUrl + '/' + data.tenderexecution.upload_document;
                    console.log('Document URL:', documentUrl);  

                    $("#upload_document_file").attr("href", documentUrl)
                                         .text("View Document")
                                         .show(); 
                } else {
                    $("#upload_document_file").hide(); 
                }
                   

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
            var url = "{{ route('tenderexecution.update', ":model_id") }}";
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
                                window.location.href = '{{ route('tenderexecution.index') }}';
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
                var url = "{{ route('tenderexecution.destroy', ":model_id") }}";

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
