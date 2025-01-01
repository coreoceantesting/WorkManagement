<x-admin.layout>
    <x-slot name="title">Work Order Generation</x-slot>
    <x-slot name="heading">Work Order Generation</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Work Order Generation</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <!-- Department -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department" required>
                                        <option value="" disabled selected>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department') == $department->id ? 'selected' : '' }}>
                                                {{ $department->department_name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
                                
        
                                <!-- Work Order Number -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_no">Work Order Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_no" name="work_order_no" type="text" placeholder="Enter Work Order Number" value="{{ old('work_order_no') }}">
                                    <span class="text-danger is-invalid work_order_no_err"></span>
                                </div>
        
                                <!-- Work Order Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_date">Work Order Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_date" name="work_order_date" type="date" value="{{ old('work_order_date') }}">
                                    <span class="text-danger is-invalid work_order_date_err"></span>
                                </div>
        
                                <!-- Agreement Number -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_no">Agreement Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_no" name="agreement_no" type="text" placeholder="Enter Agreement Number" value="{{ old('agreement_no') }}">
                                    <span class="text-danger is-invalid agreement_no_err"></span>
                                </div>
        
                                <!-- Contractor Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name" value="{{ old('contractor_name') }}">
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>
        
                                <!-- Work Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_name">Work Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_name" name="work_name" type="text" placeholder="Enter Work Name" value="{{ old('work_name') }}">
                                    <span class="text-danger is-invalid work_name_err"></span>
                                </div>
        
                                <!-- Contract Value -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contract_value">Contract Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_value" name="contract_value" type="number" step="0.01" placeholder="Enter Contract Value" value="{{ old('contract_value') }}">
                                    <span class="text-danger is-invalid contract_value_err"></span>
                                </div>
        
                                <!-- Stipulated Completion Period -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="stipulated_completion_period">Completion Period (in months)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="stipulated_completion_period" name="stipulated_completion_period" type="text" placeholder="Enter Completion Period" value="{{ old('stipulated_completion_period') }}">
                                    <span class="text-danger is-invalid stipulated_completion_period_err"></span>
                                </div>
        
                                <!-- System Tender No -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="system_tender_no">System Tender No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="system_tender_no" name="system_tender_no" type="text" placeholder="Enter System Tender Number" value="{{ old('system_tender_no') }}">
                                    <span class="text-danger is-invalid system_tender_no_err"></span>
                                </div>
        
                                <!-- System Tender Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="system_tender_date">System Tender Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="system_tender_date" name="system_tender_date" type="date" value="{{ old('system_tender_date') }}">
                                    <span class="text-danger is-invalid system_tender_date_err"></span>
                                </div>
        
                                <!-- Date of Commitment -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_commitment">Date of Commitment<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_commitment" name="date_of_commitment" type="date" value="{{ old('date_of_commitment') }}">
                                    <span class="text-danger is-invalid date_of_commitment_err"></span>
                                </div>
        
                                <!-- Work Assignee -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_assignee">Work Assignee<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_assignee" name="work_assignee" type="text" placeholder="Enter Work Assignee" value="{{ old('work_assignee') }}">
                                    <span class="text-danger is-invalid work_assignee_err"></span>
                                </div>
        
                                <!-- Document Description -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_description">Document Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="document_description" name="document_description" rows="3">{{ old('document_description') }}</textarea>
                                    <span class="text-danger is-invalid document_description_err"></span>
                                </div>
        
                                <!-- Upload Document -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_upload">Upload Document</label>
                                    <input class="form-control" id="document_upload" name="document_upload" type="file">
                                    <span class="text-danger is-invalid document_upload_err"></span>
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
                            <h4 class="card-title">Edit Work Order Generation</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <!-- Department -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department" required>
                                        <option value="" disabled>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">
                                                {{ $department->department_name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid department_err"></span>
                                </div>
        
                                <!-- Work Order Number -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_no">Work Order Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_no" name="work_order_no" type="text" placeholder="Enter Work Order Number"  >
                                    <span class="text-danger is-invalid work_order_no_err"></span>
                                </div>
        
                                <!-- Work Order Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_order_date">Work Order Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_order_date" name="work_order_date" type="date" >
                                    <span class="text-danger is-invalid work_order_date_err"></span>
                                </div>
        
                                <!-- Agreement Number -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_no">Agreement Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_no" name="agreement_no" type="text" placeholder="Enter Agreement Number" >
                                    <span class="text-danger is-invalid agreement_no_err"></span>
                                </div>
        
                                <!-- Contractor Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name" >
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>
        
                                <!-- Work Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_name">Work Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_name" name="work_name" type="text" placeholder="Enter Work Name" >
                                    <span class="text-danger is-invalid work_name_err"></span>
                                </div>
        
                                <!-- Contract Value -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contract_value">Contract Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_value" name="contract_value" type="number" step="0.01" placeholder="Enter Contract Value" >
                                    <span class="text-danger is-invalid contract_value_err"></span>
                                </div>
        
                                <!-- Stipulated Completion Period -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="stipulated_completion_period">Completion Period (in months)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="stipulated_completion_period" name="stipulated_completion_period" type="text" placeholder="Enter Completion Period">
                                    <span class="text-danger is-invalid stipulated_completion_period_err"></span>
                                </div>
        
                                <!-- System Tender No -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="system_tender_no">System Tender No<span class="text-danger">*</span></label>
                                    <input class="form-control" id="system_tender_no" name="system_tender_no" type="text" placeholder="Enter System Tender Number" >
                                    <span class="text-danger is-invalid system_tender_no_err"></span>
                                </div>
        
                                <!-- System Tender Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="system_tender_date">System Tender Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="system_tender_date" name="system_tender_date" type="date" >
                                    <span class="text-danger is-invalid system_tender_date_err"></span>
                                </div>
        
                                <!-- Date of Commitment -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_commitment">Date of Commitment<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_commitment" name="date_of_commitment" type="date" >
                                    <span class="text-danger is-invalid date_of_commitment_err"></span>
                                </div>
        
                                <!-- Work Assignee -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="work_assignee">Work Assignee<span class="text-danger">*</span></label>
                                    <input class="form-control" id="work_assignee" name="work_assignee" type="text" placeholder="Enter Work Assignee" >
                                    <span class="text-danger is-invalid work_assignee_err"></span>
                                </div>
        
                                <!-- Document Description -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_description">Document Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="document_description" name="document_description" rows="3"></textarea>
                                    <span class="text-danger is-invalid document_description_err"></span>
                                </div>
        
                                <!-- Upload Document (Optional) -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_upload">Upload Document</label>
                                    <input class="form-control" id="document_upload" name="document_upload" type="file">
                                    <a id="upload_document_file" href="" target="_blank" style="display:block;">View Document</a>
                                    <span class="text-danger is-invalid document_upload_err"></span>
                                    {{-- @if($workorder->document_upload)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $workorder->document_upload) }}" target="_blank">View Current Document</a>
                                        </div>
                                    @endif --}}
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
                                        <th>Department</th>
                                        <th>work_order_no</th>
                                        <th>work_order_date</th>
                                        <th>agreement_no</th>
                                        <th>contractor_name</th>
                                        <th>work_name</th>
                                        <th>contract_value</th>
                                        <th>stipulated_completion_period</th>
                                        <th>system_tender_no</th>
                                        <th>system_tender_date</th>
                                        <th>date_of_commitment</th>
                                        <th>work_assignee</th>
                                        <th>document_description</th>
                                        <th>document_upload</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($workList as $list)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list?->department}}</td>
                                        <td>{{ $list?->work_order_no}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->work_order_date)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->agreement_no}}</td>
                                        <td>{{ $list?->contractor_name}}</td>
                                        <td>{{ $list?->work_name}}</td>
                                        <td>{{ $list?->contract_value}}</td>
                                        <td>{{ $list?->stipulated_completion_period}}</td>
                                        <td>{{ $list?->system_tender_no}}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->system_tender_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($list->date_of_commitment)->format('d-m-Y') }}</td>
                                        <td>{{ $list?->work_assignee}}</td>
                                        <td>{{ $list?->document_description}}</td>
                                        <td>
                                            @if($list->document_upload)
                                                <a href="{{ asset('storage/' . $list->document_upload) }}" target="_blank">View Document</a>
                                            @else
                                                No Document Available
                                            @endif
                                        </td>
                                        
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
            url: '{{ route('workordergeneration.store') }}',
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
                            window.location.href = '{{ route('workordergeneration.index') }}';
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
        var url = "{{ route('workordergeneration.edit', ':model_id') }}";
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
                    $("#editForm input[name='edit_model_id']").val(data.workOrder.id);
                    $("#editForm input[name='work_order_no']").val(data.workOrder.work_order_no); 
                    $("#editForm input[name='work_order_date']").val(data.workOrder.work_order_date); 
                    $("#editForm input[name='agreement_no']").val(data.workOrder.agreement_no);
                    $("#editForm input[name='contractor_name']").val(data.workOrder.contractor_name);
                    $("#editForm input[name='work_name']").val(data.workOrder.work_name);
                    $("#editForm input[name='contract_value']").val(data.workOrder.contract_value);
                    $("#editForm input[name='stipulated_completion_period']").val(data.workOrder.stipulated_completion_period);
                    $("#editForm input[name='system_tender_no']").val(data.workOrder.system_tender_no);
                    $("#editForm input[name='system_tender_date']").val(data.workOrder.system_tender_date);
                    $("#editForm input[name='date_of_commitment']").val(data.workOrder.date_of_commitment);
                    $("#editForm input[name='work_assignee']").val(data.workOrder.work_assignee);
                    $("#editForm textarea[name='document_description']").val(data.workOrder.document_description);
                    $("#editForm select[name='department']").val(data.workOrder.department);  
                    var baseUrl = "{{ asset('storage') }}"; 
                    if (data.workOrder.document_upload) {
                        var documentUrl = baseUrl + '/' + data.workOrder.document_upload;
                        console.log('Document URL:', documentUrl);  
                        $("#upload_document_file").attr("href", documentUrl)
                                                  .text("View Document")
                                                  .show();
                    } else {
                        $("#upload_document_file").hide(); 
                    }
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
            var url = "{{ route('workordergeneration.update', ":model_id") }}";
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
                                window.location.href = '{{ route('workordergeneration.index') }}';
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
                var url = "{{ route('workordergeneration.destroy', ":model_id") }}";

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
