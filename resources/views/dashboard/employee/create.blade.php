@extends('dashboard.master')

@section('content')


<div class="card">
    <div class="card-header">
      Add an Employee
    </div>
    <div class="card-body">
      <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Employee ID</span>
            </div>
            <input type="text" class="form-control" placeholder="Employee id" aria-label="Username" aria-describedby="basic-addon1" name="emp_id">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Employee Name</span>
            </div>
            <input type="text" class="form-control" placeholder="Employee Name" aria-label="Username" aria-describedby="basic-addon1" name="emp_name">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Employee Designation</span>
            </div>
            <input type="text" class="form-control" placeholder="Employee Designation" aria-label="Username" aria-describedby="basic-addon1" name="emp_designation">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Employee Join Date</span>
            </div>
            <input type="date" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="emp_joindate">
        </div>


      <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
    </div>
  </div>
@endsection