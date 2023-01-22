@extends('dashboard.master')
@section('content')



    
    <x-alert>
        <h1>test slots data</h1>
    </x-alert>
    <!-- Begin Page Content -->
    {{-- <div class="container-fluid"> --}}

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($info as $items )
                                
                            
                            <tr>
                                <td>1</td>
                                <td>{{ $items->emp_id }}</td>
                                <td>{{ $items->emp_name }}</td>
                                <td>{{ $items->emp_designation }}</td>
                                <td>{{ $items->emp_joindate }}</td>
                                <td>
                                    <a href="{{ route('employee.show',$items->id) }}"><button class="btn btn-primary">View</button></a>
                                    <a href="{{ route('employee.edit',$items->id) }}"><button class="btn btn-success">Eidt</button></a>
                                    <form action="{{ route('employee.destroy',$items->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    {{-- </div> --}}
    <!-- /.container-fluid -->
@endsection