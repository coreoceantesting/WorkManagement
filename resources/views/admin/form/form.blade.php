<x-admin.layout>
    <x-slot name="title">Service Book</x-slot>
    <x-slot name="heading">Service Book</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Service Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="name">Name(नावं)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="race">Race(जात)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="race" name="race" type="text" placeholder="Enter Race">
                                    <span class="text-danger is-invalid race_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="residence">Residence(राहण्याचे ठिकाण) <span class="text-danger">*</span></label>
                                    <textarea class="form-control"
                                        id="residence"
                                        name="residence"
                                        placeholder="Enter Residence"
                                        rows="4"
                                    ></textarea>
                                    <span class="text-danger is-invalid residence_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fathername">Father's Name(वडीलांचे नावं)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="fathername" name="fathername" type="text" placeholder="Enter Father's Name">
                                    <span class="text-danger is-invalid fathername_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="fatherresidence">Father's Residence(वडीलांचे राहण्याचे ठिकाण) <span class="text-danger">*</span></label>
                                    <textarea class="form-control"
                                        id="fatherresidence"
                                        name="fatherresidence"
                                        placeholder="Enter Father's Residence"
                                        rows="4"
                                    ></textarea>
                                    <span class="text-danger is-invalid fatherresidence_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="dob">Date of Birth by the Christian Era as neatly as can be ascertained(जन्म झाल्याच्या तारखेचा निश्चय करून जितकी ती बरोबर लिहीता येईल तितकी ती ख्रिस्ती सनाप्रमाणे  लिहावी )  <span class="text-danger">*</span></label>
                                    <input class="form-control" id="dob" name="dob" type="date" placeholder="Enter Date of Birth " value="{{ old('date_field', \Carbon\Carbon::today()->toDateString()) }}" >
                                    <span class="text-danger is-invalid dob_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="height">Exact Height by measurement(मोजण्यात बरोबर उंची )(in cm):</label>
                                    <input type="number" id="height" name="height" class="form-control" placeholder="Enter Height" value="{{ old('height') }}" >
                                    <span class="text-danger is-invalid height_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="identification">Personal marks for identification(ओळखण्यासाठी अंगावरील खुणा)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="identification" name="identification" type="text" placeholder="Enter identification">
                                    <span class="text-danger is-invalid identification_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="education">Educational Qualification(शैक्षणिक अर्हता)<span class="text-danger">*</span></label>
                                    <select class="form-control" id="eduaction" name="education">
                                        <option value="" disabled selected>-- Select Education --</option>
                                        <option value="ssc">SSC</option>
                                        <option value="Hsc">HSC</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="graduation">Graduation</option>
                                        <option value="post graduation">Post Graduation</option>
                                    </select>
                                    <span class="text-danger is-invalid eduaction_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="signofgov"> Signature of (non-gazetted) Governament[(नॉन गॅझेटेड)सरकारी नोकरांची सही ]<span class="text-danger">*</span></label>
                                    <input class="form-control" id="signofgov" name="signofgov" type="file">
                                    {{-- <img src="{{ asset('storage/' . $form->image) }}" alt="{{ $form->name }}'s Profile Image" width="100"> --}}
                                    <span class="text-danger is-invalid signofgov_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="signofhead"> Signature of the Head of the Office or other Attesting Officer(कचेरींच्या मुख्य कामदारांची किंवा सही करणाऱ्या दुसऱ्या कामदाराची सही )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="signofhead" name="signofhead" type="file">
                                    {{-- <img src="{{ asset('storage/' . $form->image) }}" alt="{{ $form->name }}'s Profile Image" width="100"> --}}
                                    <span class="text-danger is-invalid signofhead_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="designationofhead">Designation of the Head of the Office or other Attesting Officer(कचेरींच्या मुख्य कामदारांची किंवा सही करणाऱ्या दुसऱ्या कामदाराची हुद्दा)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="designationofhead" name="designationofhead" type="text" placeholder="Enter Designation of the Head of the Office or other Attesting Officer">
                                    <span class="text-danger is-invalid identification_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="report">Report of Medical Checkup (वैदकीय तपासणी अहवाल)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="report" name="report" type="file">
                                    {{-- <img src="{{ asset('storage/' . $form->image) }}" alt="{{ $form->name }}'s Profile Image" width="100"> --}}
                                    <span class="text-danger is-invalid report_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="certifiacateno">Certifiacte No(प्रमाणपत्र क्रमांक)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="certifiacteno" name="certifiacateno" type="text" placeholder="Enter certifiacate No">
                                    <span class="text-danger is-invalid certifiacateno_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="certificatedate">Certificate Date(प्रमाणपत्र दिनांक)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="certificatedate" name="certificatedate" type="date" placeholder="Enter certificate Date" value="{{ old('date_field', \Carbon\Carbon::today()->toDateString()) }}" >
                                    <span class="text-danger is-invalid certificatedate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="authorityname">Issuing Authority Name(प्रमाणपत्र देणारा अधिकारी)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="authorityname" name="authorityname" type="text" placeholder="Enter Authority Name">
                                    <span class="text-danger is-invalid authorityname_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="authoritydesignation">Issuing Authority Designation(प्रमाणपत्र देणारा अधिकाऱ्याचे पदनाम   )<span class="text-danger">*</span></label>
                                    <input class="form-control" id="authoritydesignation" name="authoritydesignation" type="text" placeholder="Enter Authority Designation">
                                    <span class="text-danger is-invalid authoritydesignation_err"></span>
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



        


</x-admin.layout>


