<div class="row">
    <div class="col-md-2">
        <label class="col-form-label" for="unique_number">Contractor No </label>
        <input class="form-control" id="unique_number" type="text" readonly disabled>
    </div>
</div>
<div class="mb-3 row">

    <!-- Vendor Name -->
    <div class="col-md-4">
        <label class="col-form-label" for="name">Name <span class="text-danger">*</span></label>
        <input class="form-control" id="name" name="name" type="text" placeholder="Enter Name">
        <span class="text-danger is-invalid name_err"></span>
    </div>

      <!-- Contractor Type -->
      <div class="col-md-4">
        <label class="col-form-label" for="contractor_type_id">Contractor Type <span class="text-danger">*</span></label>
        <select class="form-control select2" id="contractor_type_id_{{$mode}}" name="contractor_type_id" onchange="fetchContractSubType(this,'#contractor_sub_type_id_{{$mode}}')">
            <option value="" disabled selected>Select Contractor Type</option>
            @foreach ($contractorCategorys as $contractorCategory )
            <option value="{{$contractorCategory->id}}">{{$contractorCategory->contractor_type_name}}</option>
            @endforeach
        </select>
        <span class="text-danger is-invalid contractor_type_id_err"></span>
    </div>

    <!-- Contractor Sub Type -->
    <div class="col-md-4">
        <label class="col-form-label" for="contractor_sub_type_id_{{$mode}}">Contractor Sub Type <span class="text-danger">*</span></label>
        <select class="form-control select2" id="contractor_sub_type_id_{{$mode}}" name="contractor_sub_type_id">
            <option value="" disabled selected>Select Sub Type</option>
            <option value="1">Sub Type 1</option>
            <option value="2">Sub Type 2</option>
            <!-- Add more options as needed -->
        </select>
        <span class="text-danger is-invalid contractor_sub_type_id_err"></span>
    </div>

    <!-- Company Name -->
    <div class="col-md-4">
        <label class="col-form-label" for="company_name">Company Name <span class="text-danger">*</span></label>
        <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name">
        <span class="text-danger is-invalid company_name_err"></span>
    </div>

    <!-- Email -->
    <div class="col-md-4">
        <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
        <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email">
        <span class="text-danger is-invalid email_err"></span>
    </div>

    <!-- Address -->
    <div class="col-md-4">
        <label class="col-form-label" for="address">Address <span class="text-danger">*</span></label>
        <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
        <span class="text-danger is-invalid address_err"></span>
    </div>

    <!-- Mobile No -->
    <div class="col-md-4">
        <label class="col-form-label" for="mobile_no">Mobile No <span class="text-danger">*</span></label>
        <input class="form-control" id="mobile_no" name="mobile_no" type="text"  maxlength="10" placeholder="Enter Mobile No">
        <span class="text-danger is-invalid mobile_no_err"></span>
    </div>

    <!-- Aadhaar No -->
    <div class="col-md-4">
        <label class="col-form-label" for="aadhaar_no">Aadhaar No <span class="text-danger">*</span></label>
        <input class="form-control" id="aadhaar_no" name="aadhaar_no" type="text" placeholder="Enter Aadhaar No">
        <span class="text-danger is-invalid aadhaar_no_err"></span>
    </div>

    <!-- GST No -->
    <div class="col-md-4">
        <label class="col-form-label" for="gst_no">GST No <span class="text-danger">*</span></label>
        <input class="form-control" id="gst_no" name="gst_no" type="text" placeholder="Enter GST No">
        <span class="text-danger is-invalid gst_no_err"></span>
    </div>

    <!-- VAT No (Nullable) -->
    <div class="col-md-4">
        <label class="col-form-label" for="vat_no">VAT No</label>
        <input class="form-control" id="vat_no" name="vat_no" type="text" placeholder="Enter VAT No (Optional)">
        <span class="text-danger is-invalid vat_no_err"></span>
    </div>

    <!-- PAN No -->
    <div class="col-md-4">
        <label class="col-form-label" for="pan_no">PAN No <span class="text-danger">*</span></label>
        <input class="form-control" id="pan_no" name="pan_no" type="text" placeholder="Enter PAN No">
        <span class="text-danger is-invalid pan_no_err"></span>
    </div>

    <!-- Bank Account No -->
    <div class="col-md-4">
        <label class="col-form-label" for="bank_account_no">Bank Account No <span class="text-danger">*</span></label>
        <input class="form-control" id="bank_account_no" name="bank_account_no" type="text" placeholder="Enter Bank Account No">
        <span class="text-danger is-invalid bank_account_no_err"></span>
    </div>

    <!-- Bank Name -->
    <div class="col-md-4">
        <label class="col-form-label" for="bank_name">Bank Name <span class="text-danger">*</span></label>
        <select class="form-control select2" id="bank_id_{{$mode}}" name="bank_id">
            <option value="" disabled selected>Select Bank Name</option>
            @foreach ($banks as $bank )
                <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
            @endforeach
        </select>
        <span class="text-danger is-invalid bank_id_err"></span>
    </div>

  <!-- Bank Branch Name -->
    <div class="col-md-4">
        <label class="col-form-label" for="bank_branch_name">Bank Branch Name <span class="text-danger">*</span></label>
        <input class="form-control" id="bank_branch" name="bank_branch_name" type="text" placeholder="Enter Bank Branch Name">
        <span class="text-danger is-invalid bank_branch_name_err"></span>
    </div>

    <!-- IFSC Code -->
    <div class="col-md-4">
        <label class="col-form-label" for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
        <input class="form-control" id="ifsc_code" name="ifsc_code" type="text" placeholder="Enter IFSC Code">
        <span class="text-danger is-invalid ifsc_code_err"></span>
    </div>

    <!-- status -->
    <div class="col-md-4">
        <label class="col-form-label" for="status">Status<span class="text-danger">*</span></label>
        <select class="form-control"  name="status">
            <option value="" disabled selected>-- Select Status --</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <span class="text-danger is-invalid status_err"></span>
    </div>
</div>

