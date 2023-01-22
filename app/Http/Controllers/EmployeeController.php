<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
                        ->with('success','User created successfully.');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $info=Employee::findOrFail($employee->emp_id);
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
        $info=Employee::findOrFail($employee->emp_id);
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
        Employee::whereId($employee->emp_id)->update($updata);
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
        Employee::findOrFail($employee->emp_id)->delete();
        return redirect()->route('employee.index')->with('danger','Employee information deleteed successfully');
    }
}
