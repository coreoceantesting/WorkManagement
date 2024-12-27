<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\admin\masters\TenderEntry\StoreTenderEntryRequest;
use App\Http\Requests\admin\masters\TenderEntry\UpdateTenderEntryRequest;
use App\Models\Contractor;
use App\Models\Projectinfo;
use App\Models\Tenderentry;
use App\Models\Workdefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class TenderEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenderentry = Tenderentry::with('projectinfoData','vendorData','workdefinationData')->latest()->get();

        $data['projectinfo'] = Projectinfo::latest()->get();
        $data['vendor'] = Contractor::latest()->get();
        $data['workdefination'] = Workdefinition::latest()->get();

        return view('admin.masters.tenderentry',compact('tenderentry'), $data);
    }

    public function getResults(Request $request)
    {
        // echo "Fffdds";die;
        $results = Tenderentry::query();

        if ($request->filled('projectname')) {
            $results->where('projectname', $request->projectname);
        }
        if ($request->filled('workname')) {
            $results->where('workname', $request->workname);
        }
        if ($request->filled('vendorname')) {
            $results->where('vendorname', $request->vendorname);
        }

        $data['projectinfo'] = Projectinfo::latest()->get();
        $data['vendor'] = Contractor::latest()->get();
        $data['workdefination'] = Workdefinition::latest()->get();
        $tenderentry = $results->get();

        return view('admin.masters.tenderentry',compact('tenderentry'), $data);
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
    public function store(StoreTenderEntryRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            Tenderentry::create($input);
            DB::commit();

            return response()->json(['success'=> 'Tender Entry created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Tenderentry');
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
    public function edit(Tenderentry $tenderentry)
    {
        $projectinfo = Projectinfo::all();
        $vendor = Contractor::all();
        $workdefinition = Workdefinition::all();
        if ($tenderentry)
        {
            $mastersHtml = '<span>
            <option value="">--Select--</option>';
            foreach ($projectinfo as $project):
                $is_select = $project->id == $tenderentry->projectname ? "selected" : "";
                $mastersHtml .= '<option value="' . $project->id . '" ' . $is_select . '>' . $project->projectnameenglish.'</option>';
            endforeach;
            $mastersHtml .= '</span>';

            $mastersHtml1 = '<span>
            <option value="">--Select--</option>';
            foreach ($vendor as $ven):
                $is_select = $ven->id == $tenderentry->vendorname ? "selected" : "";
                $mastersHtml1 .= '<option value="' . $ven->id . '" ' . $is_select . '>' . $ven->vendorname.'</option>';
            endforeach;
            $mastersHtml1 .= '</span>';  

            $mastersHtml2 = '<span>
            <option value="">--Select--</option>';
            foreach ($workdefinition as $work):
                $is_select = $work->id == $tenderentry->workname ? "selected" : "";
                $mastersHtml2 .= '<option value="' . $work->id . '" ' . $is_select . '>' . $work->workname.'</option>';
            endforeach;
            $mastersHtml2 .= '</span>';
            $response = [
                'result' => 1,
                'tenderentry' => $tenderentry,
                'mastersHtml' => $mastersHtml,
                'mastersHtml1' => $mastersHtml1,
                'mastersHtml2' => $mastersHtml2,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenderEntryRequest $request, Tenderentry $tenderentry)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $tenderentry->update($input);
            DB::commit();

            return response()->json(['success'=> 'Tender Entry updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Tenderentry');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenderentry $tenderentry)
    {
        try
        {
            DB::beginTransaction();
            $tenderentry->delete();
            DB::commit();

            return response()->json(['success'=> 'Tender Entry deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Tenderentry');
        }
    }
}
