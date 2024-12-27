<x-admin.layout>
    <x-slot name="title">ProjectInfo</x-slot>
    <x-slot name="heading">ProjectInfo</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Project Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectno">Project Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectno" name="projectno" type="number" placeholder="Enter Project Number">
                                    <span class="text-danger is-invalid projectno_err"></span>
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
                                    <label class="col-form-label" for="projectnameenglish"> Project Name(English)<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectnameenglish" id="projectnameenglish" type="text" placeholder="Enter Project Name(English)">
                                    <span class="text-danger is-invalid projectnameenglish_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectnameregional"> Project Name(Regional)<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectnameregional" id="projectnameregional" type="text" placeholder="Enter Project Name(Regional)">
                                    <span class="text-danger is-invalid projectnameregional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectdescription"> Project Description<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectdescription" id="projectdescription" type="text" placeholder="Enter Project Description">
                                    <span class="text-danger is-invalid projectdescription_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projecttimeline"> Project Timeline<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projecttimeline" id="projecttimeline" type="text" placeholder="Enter Project Timeline">
                                    <span class="text-danger is-invalid projecttimeline_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectstartdate">Project Start Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectstartdate" name="projectstartdate" type="date" placeholder="Enter Project Start Date">
                                    <span class="text-danger is-invalid projectstartdate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectenddate">Project End Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectenddate" name="projectenddate" type="date" placeholder="Enter Project End Date">
                                    <span class="text-danger is-invalid projectenddate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schemename">Select Scheme<span class="text-danger">*</span></label>
                                    <select class="form-control" id="schemename" name="schemename">
                                        <option value="">-- select --</option>
                                        @foreach($scheme as $scheme)
                                        <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approvalnumber"> Approval Number<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="approvalnumber" id="approvalnumber" type="number" placeholder="Enter Approval Number">
                                    <span class="text-danger is-invalid approvalnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approvaldate">Approval Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectstartdate" name="approvaldate" type="date" placeholder="Enter Approval Date">
                                    <span class="text-danger is-invalid approvaldate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Select Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="">-- select --</option>
                                        @foreach($status as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                                <!-- <div class="col-md-4">
                                    <label class="col-form-label" for="document[]">Upload Document </label>
                                    <input class="form-control" id="document[]" name="document[]" type="file">
                                    <span class="text-danger is-invalid document_err"></span>
                                </div> -->
                                
                            </div>
                            
                            <!-- Project Document Section -->
                                <div class="panel panel-footer">
                                <div class="card-header">
                                    <h4 class="card-title">Add Document Information</h4>
                                </div>
                                        <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Document No </th>
                                                <th>Document Name </th>
                                                <th>Document </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td><input type="number" name="document_no[]" class="form-control" multiple=""></td>    
                                            <td><input type="text" name="document_name[]" class="form-control" multiple=""></td>    
                                            <td><input type="file" name="document[]" class="form-control" multiple=""></td>    
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>

                        </div>
                        <div class="panel panel-footer">
                                <div class="card-header">
                                    <h4 class="card-title">Add Financial Information</h4>
                                </div>
                                        <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Financial Year</th>
                                                <th>Budget</th>
                                                <th>Field</th>
                                                <th>Remark</th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFinancialForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addFinancialMore">
                                        <tr>
                                            <td><select name="title[]" class="form-select addFormSelectCategory" required>
                                                            <option value="">Select Financial Year</option>
                                                            @foreach($financialyear as $year)
                                                            <option value="{{ $year->id }}">{{ $year->title}}</option>
                                                            @endforeach
                                                        </select></td>    
                                              
                                            <td><select name="budgetamount[]" class="form-select addFormSelectCategory" required>
                                                            <option value="">Select Budget Amount</option>
                                                            @foreach($budgethead as $budget)
                                                            <option value="{{ $budget->id }}">{{ $budget->budgetamount}}</option>
                                                            @endforeach
                                                        </select></td>  
                                            
                                            <td><select name="field_name[]" class="form-select addFormSelectCategory" required>
                                                            <option value="">Select Field</option>
                                                            @foreach($fields as $field)
                                                            <option value="{{ $field->id }}">{{ $field->field_name}}</option>
                                                            @endforeach
                                                        </select></td>  
                                            <td><input type="text" name="remark[]" class="form-control" multiple=""></td>  
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeFinancialMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>

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
                            <h4 class="card-title">Edit Field</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="projectno">Project Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectno" name="projectno" type="number" placeholder="Enter Project Number">
                                    <span class="text-danger is-invalid projectno_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="department">Select Department<span class="text-danger">*</span></label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="">-- select --</option>
                                        
                                    </select>
                                    <span class="text-danger is-invalid department_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectnameenglish"> Project Name(English)<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectnameenglish" id="projectnameenglish" type="text" placeholder="Enter Project Name(English)">
                                    <span class="text-danger is-invalid projectnameenglish_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectnameregional"> Project Name(Regional)<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectnameregional" id="projectnameregional" type="text" placeholder="Enter Project Name(Regional)">
                                    <span class="text-danger is-invalid projectnameregional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectdescription"> Project Description<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projectdescription" id="projectdescription" type="text" placeholder="Enter Project Description">
                                    <span class="text-danger is-invalid projectdescription_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projecttimeline"> Project Timeline<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="projecttimeline" id="projecttimeline" type="text" placeholder="Enter Project Timeline">
                                    <span class="text-danger is-invalid projecttimeline_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectstartdate">Project Start Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectstartdate" name="projectstartdate" type="date" placeholder="Enter Project Start Date">
                                    <span class="text-danger is-invalid projectstartdate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="projectenddate">Project End Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectenddate" name="projectenddate" type="date" placeholder="Enter Project End Date">
                                    <span class="text-danger is-invalid projectenddate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schemename">Select Scheme<span class="text-danger">*</span></label>
                                    <select class="form-control" id="schemename" name="schemename">
                                        <option value="">-- select --</option>
                                        
                                    </select>
                                    <span class="text-danger is-invalid schemename_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approvalnumber"> Approval Number<span class="text-danger">*</span></label>
                                    <input class="form-control"  name="approvalnumber" id="approvalnumber" type="number" placeholder="Enter Approval Number">
                                    <span class="text-danger is-invalid approvalnumber_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="approvaldate">Approval Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="projectstartdate" name="approvaldate" type="date" placeholder="Enter Approval Date">
                                    <span class="text-danger is-invalid approvaldate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="status">Select Status<span class="text-danger">*</span></label>
                                    <select class="form-control"  name="status">
                                        <option value="">-- select --</option>
                                        
                                    </select>
                                    <span class="text-danger is-invalid status_err"></span>
                                </div>
                            
                            </div>
                            <div class="panel panel-footer">
                                <div class="card-header">
                                    <h4 class="card-title">Add Financial Information</h4>
                                </div>
                                        <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Financial Year</th>
                                                <th>Budget</th>
                                                <th>Field</th>
                                                <th>Remark</th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreFinancialForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addFinancialMoreEdit">
                                        
                                    </tbody>
                                </table>
                            </div><br>

                               <!-- Project Document Section -->
                               <div class="panel panel-footer">
                                <div class="card-header">
                                    <h4 class="card-title">Add Document Information</h4>
                                </div>
                                        <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>Document No </th>
                                                <th>Document Name </th>
                                                <th>Document </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMoreEdit">
                                        <tr>
                                           
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>


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
                                        <th>Project Number</th>
                                        <th>Department</th>
                                        <th>Project Name(English)</th>
                                        <th>Project Name(Regional)</th>
                                        <th>Project Description</th>
                                        <th>Project Timeline</th>
                                        <th>Project Start Date</th>
                                        <th>Project End Date</th>
                                        <th>Scheme</th>
                                        <th>Approval Number</th>
                                        <th>Approval Date</th>
                                        <th>Project Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach ($projectinfoList as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->projectno }}</td>
                                            <td>{{ $list?->departmentData?->department_name }}</td>
                                            <td>{{ $list->projectnameenglish }}</td>
                                            <td>{{ $list->projectnameregional }}</td>
                                            <td>{{ $list->projectdescription}}</td>
                                            <td>{{ $list->projecttimeline	}}</td>
                                            <td>{{ $list->projectstartdate}}</td>
                                            <td>{{ $list->projectenddate}}</td>
                                            <td>{{ $list->schemeData->name}}</td>
                                            <td>{{ $list->approvalnumber	}}</td>
                                            <td>{{ $list->approvaldate}}</td>
                                            <td>{{ $list->statusData->status}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Project" data-id="{{ $list->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Project" data-id="{{ $list->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
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
            url: '{{ route('projectinfo.store') }}',
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
                            window.location.href = '{{ route('projectinfo.index') }}';
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
        var url = "{{ route('projectinfo.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.projectinfo.id);
                    $("#editForm input[name='projectno']").val(data.projectinfo.projectno);
                    $("#editForm input[name='projectnameenglish']").val(data.projectinfo.projectnameenglish);
                    $("#editForm input[name='projectnameregional']").val(data.projectinfo.projectnameregional);
                    $("#editForm input[name='projectdescription']").val(data.projectinfo.projectdescription);
                    $("#editForm input[name='projecttimeline']").val(data.projectinfo.projecttimeline);
                    $("#editForm input[name='projectstartdate']").val(data.projectinfo.projectstartdate);
                    $("#editForm input[name='projectenddate']").val(data.projectinfo.projectenddate);
                    $("#editForm input[name='approvalnumber']").val(data.projectinfo.approvalnumber);
                    $("#editForm input[name='approvaldate']").val(data.projectinfo.approvaldate);
                    $("#editForm select[name='schemename']").html(data.mastersHtml);
                    $("#editForm select[name='department']").html(data.mastersHtml1);
                    $("#editForm select[name='status']").html(data.mastersHtml2);


                   //Add more previous selected
                    var tableBody = $('#addFinancialMoreEdit');
                    tableBody.empty();
                    tableBody.append(data.tableRows);
                    tableBody.find('.js-example-basic-single').select2();


                    //Add more previous selected
                    $('#addMoreEdit').html(data.tableRows1);
                    // tableBody1.empty();
                    // tableBody1.append(data.tableRows1);
                    // tableBody1.find('.js-example-basic-single').select2();  


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
            var url = "{{ route('projectinfo.update', ":model_id") }}";
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
                                window.location.href = '{{ route('projectinfo.index') }}';
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
            title: "Are you sure to delete this Project ?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('projectinfo.destroy', ":model_id") }}";

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



{{-- Add More Form --}}
<script>
  $('.addMoreForm').on('click',function(){
    addMoreForm();
  });

  var rowId = 1; 
  function addMoreForm() {
    var tr = '<tr id="row_' + rowId + '">' +
        '<td><input type="number" name="document_no[]" class="form-control" multiple=""></td>' +
        '<td><input type="text" name="document_name[]" class="form-control" multiple=""></td>' +
        '<td><input type="file" name="document[]" class="form-control" multiple=""></td>' +
        '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
        '<tr>';

    $('#addMore').append(tr); 
    $('#type_of_use_id_' + rowId + ', #estate_id_' + rowId).select2();   // Reinitialize Select2 for the new row
    rowId++;
}

  $(document).on('click', '.removeAddMore', function () {
    if ($(this).parents('table').find('.removeAddMore').length > 1) {
        $(this).parent().parent().remove();
    } else {
        alert("Cannot remove the last element.");
    }        
  });
</script>

<script>
  $('.addMoreFinancialForm').on('click',function(){
    addMoreFinancialForm();
  });

  var rowId = 1; 
  function addMoreFinancialForm() {
    var tr = '<tr id="row_' + rowId + '">' +
        '<td>' +
    '<select name="title[]" class="form-select addFormSelectCategory" required>' +
        '<option value="">Select Financial Year</option>' +
        '@foreach($financialyear as $year)'+
        '<option value="{{ $year->id }}">{{ $year->title }}</option>' +
        '@endforeach'+
    '</select>' +
'</td>' +
'<td>' +
    '<select name="budgetamount[]" class="form-select addFormSelectCategory" required>' +
        '<option value="">Select Budget Amount</option>' +
        '@foreach($budgethead as $budget)'+
        '<option value="{{ $budget->id }}">{{ $budget->budgetamount }}</option>' +
       ' @endforeach'+
    '</select>' +
'</td>' +
'<td>' +
    '<select name="field_name[]" class="form-select addFormSelectCategory" required>' +
        '<option value="">Select Field</option>' +
        '@foreach($fields as $field)'+
        '<option value="{{ $field->id }}">{{ $field->field_name }}</option>' +
        '@endforeach'+
    '</select>' +
'</td>'+
'<td><input type="text" name="remark[]" class="form-control" multiple=""></td>' +
        '<td><a href="javascrip:" class="btn btn-sm btn-danger removeFinancialMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
        '<tr>';

    $('#addFinancialMore').append(tr); 
    $('#type_of_use_id_' + rowId + ', #estate_id_' + rowId).select2();   // Reinitialize Select2 for the new row
    rowId++;
}

  $(document).on('click', '.removeFinancialMore', function () {
    if ($(this).parents('table').find('.removeFinancialMore').length > 1) {
        $(this).parent().parent().remove();

  

    } else {
        alert("Cannot remove the last element.");
    }        
  });
</script>
