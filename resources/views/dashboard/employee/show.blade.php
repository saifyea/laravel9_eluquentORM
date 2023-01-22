@extends('dashboard.master')

@section('content')

<div class="row">
    <div class="col">
        <label for="">ID</label>
      <input type="text" class="form-control" placeholder="{{ $info->emp_id }}">
    </div>
    <div class="col">
        <label for="">Name</label>
      <input type="text" class="form-control" placeholder="{{ $info->emp_name }}">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
        <label for="">Designation</label>
      <input type="text" class="form-control" placeholder="{{ $info->emp_designation }}">
    </div>
    <div class="col">
        <label for="">Joining Date</label>
      <input type="text" class="form-control" placeholder="{{ $info->emp_joindate }}">
    </div>
  </div>
  <br>
  <a href="{{ route('employee.index') }}"><button class="btn btn-primary">Back</button></a>   
@endsection