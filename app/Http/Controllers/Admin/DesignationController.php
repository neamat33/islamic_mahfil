<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DesignationService;
use DB;

class DesignationController extends Controller
{
    protected $DesignationService;
    public function __construct(DesignationService $DesignationService)
    {
        $this->DesignationService = $DesignationService;
    }

    public function index()
    {
        $data['designations'] = $this->DesignationService->get();
        return view('admin.designation.list', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->DesignationService->add($data);
            return redirect()->route('designations.index')->with('success', 'Designation Created Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('designations.index')->with('error', $error_message);
        }
    }

    public function edit()
    {
       $id = $_GET['id'];
       return DB::table('designations')->where('id', $id)->where('status_id', 1)->first();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->DesignationService->update($data, $id);
            return redirect()->route('designations.index')->with('success', 'Designation Update Successfully');
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('designations.index')->with('error', $error_message);
        }
    }

    public function destroy($id)
    {
        try {
            $this->DesignationService->delete($id);
            return redirect()->route('designations.index')->with('success', 'Deleted successfully');
        }catch (\Exception $e) {
            $error_message = $e->getMessage();
            return redirect()->route('designations.index')->with('error', $error_message);
        }
    }
}
