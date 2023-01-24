<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportEmployee;
use App\Exports\ExportEmployee;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info=Employee::all();
        return view('dashboard.employee.employee',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_id' => 'required',
            'emp_name' => 'required',
            'emp_designation' => 'required',
            'emp_joindate' => 'required',
        ]);
    
        Employee::create($request->all());
     
        return redirect()->route('employee.index')
                        ->with('success', 'Successfully completed the action!');;
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $info=Employee::findOrFail($employee->id);
        return view('dashboard.employee.show',compact('info'));
        //dd($employee->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $info=Employee::findOrFail($employee->id);
        return view('dashboard.employee.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $updata=$request->validate([
            'emp_id'=>'required',
            'emp_name'=>'required',
            'emp_designation'=>'required',
            'emp_joindate'=>'required'
        ]);
        //dd($updata);
        Employee::whereId($employee->id)->update($updata);
        //$employee->update($request->all());
        return redirect()->route('employee.index')->with('success','Employee information updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::findOrFail($employee->id)->delete();
        return redirect()->route('employee.index')->with('warning','Employee information deleteed successfully');
    }
    
    public function importView(Request $request){
        return view('importFile');
    }
 
    public function import(Request $request){
        Excel::import(new ImportEmployee,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportEmployee(Request $request){
        return Excel::download(new ExportEmployee, 'Employee.xlsx');
    }
    // Generate PDF
    public function createPdf() {
        dd('test');
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');

       // retreive all records from db
      $data = Employee::all();
      // share data to view
      view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', $data);
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
      }
    
    Public function testpdf(Employee $employee){
        //$data = Employee::where('id',11)->get();
        $data=Employee::findOrFail(11);
        view()->share('employee',$data);
        $pdf = PDF::loadview('dashboard.employee.pdf', compact('data'));
        return $pdf->download('invoice.pdf');
        //dd('test');
    }
}
