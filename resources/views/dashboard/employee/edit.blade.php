@extends('dashboard.master')

@section('content')
<form action="{{ route('employee.update',$info->id)}}" method="post">
    @csrf
    @method('PUT') 


<div class="row">
    <div class="col">
        <label for="">ID</label>
      <input type="text" class="form-control" value="{{ $info->emp_id }}" name="emp_id">
    </div>
    <div class="col">
        <label for="">Name</label>
      <input type="text" class="form-control" value="{{ $info->emp_name }}" name="emp_name">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
        <label for="">Designation</label>
      <input type="text" class="form-control" value="{{ $info->emp_designation }}" name="emp_designation">
    </div>
    <div class="col">
        <label for="">Joining Date</label>
      <input type="text" class="form-control" value="{{ $info->emp_joindate }}" name="emp_joindate">
    </div>
  </div>
  <br>
  <a href="{{ route('employee.index') }}"><button class="btn btn-primary">Back</button></a> 
  

  <button type="submit" class="btn btn-primary right">Update</button>
</form>   
@endsection