<x-admin.layout>
    <x-slot name="title">Extension Period</x-slot>
    <x-slot name="heading">Extension Period</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Extension Period</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <!-- Agreement No -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_no">Agreement No <span class="text-danger">*</span></label>
                                    <select class="form-control" id="agreement_no" name="agreement_no" required>
                                        <option value="" disabled selected>Select Agreement No</option>
                                        <!-- Add actual options here -->
                                        <option value="AG001">AG001</option>
                                        <option value="AG002">AG002</option>
                                        <!-- More options -->
                                    </select>
                                    <span class="text-danger is-invalid agreement_no_err"></span>
                                </div>
        
                                <!-- Contractor Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name" value="{{ old('contractor_name') }}" required>
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>
        
                                <!-- Agreement From Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_from_date">Agreement From Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_from_date" name="agreement_from_date" type="date" value="{{ old('agreement_from_date') }}" required>
                                    <span class="text-danger is-invalid agreement_from_date_err"></span>
                                </div>
        
                                <!-- Agreement To Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_to_date">Agreement To Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_to_date" name="agreement_to_date" type="date" value="{{ old('agreement_to_date') }}" required>
                                    <span class="text-danger is-invalid agreement_to_date_err"></span>
                                </div>
        
                                <!-- Extension Period -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="extension_period">Extension Period <span class="text-danger">*</span></label>
                                    <select class="form-control" id="extension_period" name="extension_period" required>
                                        <option value="" disabled selected>Select Extension Period</option>
                                        <option value="days">Days</option>
                                        <option value="hours">Hours</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                    <span class="text-danger is-invalid extension_period_err"></span>
                                </div>
                                
                                <!-- Input Field for Time Period -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="extension_value">Value <span class="text-danger">*</span></label>
                                    <input class="form-control" id="extension_value" name="extension_value" type="text" placeholder="Enter Value" required>
                                    <span class="text-danger is-invalid extension_value_err"></span>
                                </div>
                                
                              
                                <!-- Document Description -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_description">Document Description <span class="text-danger">*</span></label>
                                    <input class="form-control" id="document_description" name="document_description" type="text" placeholder="Enter Document Description" value="{{ old('document_description') }}" required>
                                    <span class="text-danger is-invalid document_description_err"></span>
                                </div>
        
                                <!-- Upload Document -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upload_document">Upload Document <span class="text-danger">*</span></label>
                                    <input class="form-control" id="upload_document" name="upload_document" type="file" required>
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
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="editForm" id="editForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Edit Extension Period</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">

                            <div class="mb-3 row">
                                <!-- Agreement No -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_no">Agreement No <span class="text-danger">*</span></label>
                                    <select class="form-control" id="agreement_no" name="agreement_no" required>
                                        <option value="AG001">AG001</option>
                                        <option value="AG002">AG002</option>
                                    </select>
                                    <span class="text-danger is-invalid agreement_no_err"></span>
                                </div>

                                <!-- Contractor Name -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="contractor_name">Contractor Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="contractor_name" name="contractor_name" type="text" placeholder="Enter Contractor Name" value="{{ old('contractor_name', $contractorName ?? '') }}" required>
                                    <span class="text-danger is-invalid contractor_name_err"></span>
                                </div>

                                <!-- Agreement From Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_from_date">Agreement From Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_from_date" name="agreement_from_date" type="date" value="{{ old('agreement_from_date', $agreementFromDate ?? '') }}" required>
                                    <span class="text-danger is-invalid agreement_from_date_err"></span>
                                </div>

                                <!-- Agreement To Date -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="agreement_to_date">Agreement To Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="agreement_to_date" name="agreement_to_date" type="date" value="{{ old('agreement_to_date', $agreementToDate ?? '') }}" required>
                                    <span class="text-danger is-invalid agreement_to_date_err"></span>
                                </div>

                                <!-- Extension Period -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="extension_period">Extension Period <span class="text-danger">*</span></label>
                                    <select class="form-control" id="extension_period" name="extension_period" required>
                                        <option value="" disabled>Select Extension Period</option>
                                        <option value="days" {{ old('extension_period', $extensionPeriod ?? '') == 'days' ? 'selected' : '' }}>Days</option>
                                        <option value="hours" {{ old('extension_period', $extensionPeriod ?? '') == 'hours' ? 'selected' : '' }}>Hours</option>
                                        <option value="months" {{ old('extension_period', $extensionPeriod ?? '') == 'months' ? 'selected' : '' }}>Months</option>
                                        <option value="years" {{ old('extension_period', $extensionPeriod ?? '') == 'years' ? 'selected' : '' }}>Years</option>
                                    </select>
                                    <span class="text-danger is-invalid extension_period_err"></span>
                                </div>

                                <!-- Document Description -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="document_description">Document Description <span class="text-danger">*</span></label>
                                    <input class="form-control" id="document_description" name="document_description" type="text" placeholder="Enter Document Description" value="{{ old('document_description', $documentDescription ?? '') }}" required>
                                    <span class="text-danger is-invalid document_description_err"></span>
                                </div>

                                <!-- Upload Document -->
                                <div class="col-md-4">
                                    <label class="col-form-label" for="upload_document">Upload Document</label>
                                    <input class="form-control" id="upload_document" name="upload_document" type="file">
                                    <a id="upload_document_fileextension" href="" target="_blank" style="display:block;">View Document</a>
                                    <span class="text-danger is-invalid upload_document_fileextension_err"></span>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="editSubmit">Submit</button>
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
                                        <th>Agreement No</th>
                                        <th>Contractor Name</th>
                                        <th>Agreement From Date</th>
                                        <th>Agreement To Date</th>
                                        <th>Extension Period</th>
                                        <th>Document Description</th>
                                        <th>Upload Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($extensionperiod as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->agreement_no }}</td>
                                            <td>{{ $list->contractor_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->agreement_from_date)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($list->agreement_to_date)->format('d-m-Y') }}</td>
                                            <td>{{ $list->extension_period }}</td>
                                            <td>{{ $list->document_description }}</td>
                                            <td>
                                                @if($list->upload_document)
                                                    <a href="{{ asset('storage/' . $list->upload_document) }}" target="_blank">View Document</a>
                                                @else
                                                    No Document Available
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" value="{{ $list->id }}" title="Edit" data-id="{{ $list->id }}">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <button class="btn text-danger rem-element px-2 py-1" value="{{ $list->id }}" title="Delete" data-id="{{ $list->id }}">
                                                    <i data-feather="trash-2"></i> 
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
            url: '{{ route('extensionperiod.store') }}',
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
                            window.location.href = '{{ route('extensionperiod.index') }}';
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
    var url = "{{ route('extensionperiod.edit', ':model_id') }}"; 
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
                
                $("#editForm input[name='edit_model_id']").val(data.extensionperiod.id);
                $("#editForm input[name='agreement_no']").val(data.extensionperiod.agreement_no);
                $("#editForm input[name='contractor_name']").val(data.extensionperiod.contractor_name);
                $("#editForm input[name='agreement_from_date']").val(data.extensionperiod.agreement_from_date);
                $("#editForm input[name='agreement_to_date']").val(data.extensionperiod.agreement_to_date);
                $("#editForm input[name='extension_period']").val(data.extensionperiod.extension_period);
                $("#editForm input[name='document_description']").val(data.extensionperiod.document_description);
                $("#editForm input[name='upload_document']").val(data.extensionperiod.upload_document);
                
                var baseUrl = "{{ asset('storage') }}"; 

                if (data.extensionperiod && data.extensionperiod.upload_document) {
                    var documentUrl = baseUrl + '/extension_documents/' + data.extensionperiod.upload_document; 
                    console.log('Document URL:', documentUrl);  
                    $("#upload_document_fileextension")
                        .attr("href", documentUrl)
                        .text("View Document")     
                        .show();                 
                } else {
               
                    $("#upload_document_fileextension").hide();
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
            var url = "{{ route('extensionperiod.update', ":model_id") }}";
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
                                window.location.href = '{{ route('extensionperiod.index') }}';
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
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('extensionperiod.destroy', ":model_id") }}";

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
