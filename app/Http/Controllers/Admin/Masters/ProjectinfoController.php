<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\Project\UpdateprojectRequest;
use App\Http\Requests\admin\masters\Projectinfo\StoreProjectinfoRequest;
use App\Http\Requests\admin\masters\Projectinfo\UpdateProjectinfoRequest;
use App\Models\BudgetHead;
use App\Models\Department;
use App\Models\Document;
use App\Models\Field;
use App\Models\FinancialYear;
use App\Models\project;
use App\Models\ProjectData;
use App\Models\Projectinfo;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectinfoList = Projectinfo::with('departmentData','statusData','schemeData','fieldData','budgetData','financialData')->latest()->get();


        // echo "<pre>";
        // print_r($budgetheadList);
        // die;
       
        $data['scheme'] = Scheme::latest()->get();
        $data['departments'] = Department::latest()->get();
        $data['status'] = ProjectData::latest()->get();
        $data['financialyear']= FinancialYear::latest()->get();
        $data['budgethead'] = BudgetHead::latest()->get();
        $data['fields'] = Field::latest()->get();
        return view('admin.masters.projectinfo.projectinfo',compact('projectinfoList'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectinfoRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $data = Projectinfo::create($input);

            foreach ($input['document_no'] as $key => $document_no) {
                // Prepare the document data
                $documentData = [
                    'projectinfo_id' => $data->id,
                    'document_no' => $document_no,
                    'document_name' => $input['document_name'][$key],
                ];
            
                // Check if a file was uploaded for this document
                if ($request->hasFile('document') && $request->file('document')[$key]->isValid()) {
                    $document = $request->file('document')[$key];
                    // Store the file and get its path
                    $documentPath = $document->store('project/documents');
                    // Add the document path to the data array
                    $documentData['document'] = $documentPath;
                }
                
            
                // Insert the document data into the documents table using DB::table()
                DB::table('document')->insert($documentData);
            }

            foreach ($input['title'] as $key => $title) {
                $financialdata = [
                    'projectinfo_id' => $data->id,
                    'title' => $input['title'][$key],
                    'budgetamount' => $input['budgetamount'][$key],
                    'field_name' => $input['field_name'][$key],
                    'remark' => $input['remark'][$key],
                ];
                DB::table('financialinfo')->insert($financialdata);
                }
            // Insert the financial data into the financialinfo table using DB::table()
            
            DB::commit();

            return response()->json(['success'=> 'Project Information created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'ProjectInfo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projectinfo $projectinfo)
    {
        $projectinfo->load('fiancialData');
        $depndtData = $projectinfo->fiancialData;

        $projectinfo->load('documentData');
        $dataofdata = $projectinfo->documentData;

        
        $scheme = Scheme::all();
        $department = Department::all();
        $status = ProjectData::all();
        $financial = FinancialYear::all();
        $budget = BudgetHead::all();
        $field = Field::all();
        if ($projectinfo) {

            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($scheme as $scheme):
                $is_select = $scheme->id == $projectinfo->schemename ? "selected" : "";
                $mastersHtml .= '<option value="' . $scheme->id . '" ' . $is_select . '>' . $scheme->name.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            $mastersHtml1 = '<span>
            <option value="">--Select--</option>';
            foreach ($department as $department):
                $is_select = $department->id == $projectinfo->department ? "selected" : "";
                $mastersHtml1 .= '<option value="' . $department->id . '" ' . $is_select . '>' . $department->department_name.'</option>';
            endforeach;
            $mastersHtml1 .= '</span>';  

            $mastersHtml2 = '<span>
            <option value="">--Select--</option>';
            foreach ($status as $status):
                $is_select = $status->id == $projectinfo->status ? "selected" : "";
                $mastersHtml2 .= '<option value="' . $status->id . '" ' . $is_select . '>' . $status->status.'</option>';
            endforeach;
            $mastersHtml2 .= '</span>';  

            $tableRows = '';
            foreach ($depndtData as $index=> $rowData) {

                // print_r($rowData);
                // die;

                $tableRows .= '<tr>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="title[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                foreach($financial as $data):
                $is_select = $data->id == $rowData->title ? "selected" : "";
                $tableRows .= '<option value="'.$data->id.'" '.$is_select.'>'.$data->title.'</option>';
                endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="budgetamount[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                foreach($budget as $budget):
                $is_select = $budget->id == $rowData->budgetamount ? "selected" : "";
                $tableRows .= '<option value="'.$budget->id.'" '.$is_select.'>'.$budget->budgetamount.'</option>';
                endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td>';
                $tableRows .= '<select name="field_name[]" class="js-example-basic-single form-control">';
                $tableRows .='<option value="">--Select--</option>';
                foreach($field as $field):
                $is_select = $field->id == $rowData->field_name ? "selected" : "";
                $tableRows .= '<option value="'.$field->id.'" '.$is_select.'>'.$field->field_name.'</option>';
                endforeach;
                $tableRows .= '</select>';
                $tableRows .= '</td>';
                $tableRows .= '<td><input type="text" name="remark[]" value="' . $rowData->remark . '" class="form-control" ></td>';
                $tableRows .= '</tr>';
            }
            $tableRows1 = '';
            // dd($dataofdata);
            foreach ($dataofdata as $index=> $rowData1) {

                // print_r($rowData);
                // die;

                $tableRows1 .= '<tr>
                                    <td>
                                        <input type="text" name="document_no[]" value="' . $rowData1->document_no . '" class="form-control" >
                                    </td>
                                    <td>
                                        <input type="text" name="document_name[]" value="' . $rowData1->document_name . '" class="form-control" >
                                    </td>
                                    <td>
                                        <input type="file" name="document[]" class="form-control" style="margin-bottom:5px;">' . (!empty($rowData1->document) ? '<a href="'.asset('storage/'.$rowData1->document).'" target="_blank" class="btn btn-sm btn-primary"> View File </a>' : '<label>No document</label>') . '
                                    </td>
                                </tr>';
            }

            // print_r($tableRows);
            // die;

            $response = [
                'result' => 1,
                'projectinfo' => $projectinfo,
                'mastersHtml' => $mastersHtml,
                'mastersHtml1' => $mastersHtml1,
                'mastersHtml2' => $mastersHtml2,
                'tableRows' => $tableRows,
                'tableRows1' => $tableRows1,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectinfoRequest $request, Projectinfo $projectinfo)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $projectinfo->update($input);
            DB::commit();

            return response()->json(['success'=> 'Project Information updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'projectInfo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projectinfo $projectinfo)
    {
        try
        {
            DB::beginTransaction();
            $projectinfo->delete();
            DB::commit();

            return response()->json(['success'=> 'Project Information deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ProjectInfo');
        }
    }
}
