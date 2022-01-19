@extends('layouts.app', ['active' => 'employee'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between mx-auto my-3">
                        <button class="btn btn-outline-success">Import XLS</button>
                        <a href="{{ url('/employee/create') }}"><button class="btn btn-success">Add Employee</button></a>
                    </div>
                    @if($employees->isEmpty())
                        {{ __('No Data Available') }}
                    @else
                        <table  class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($employees as $e)
                            <tr>
                                <td>{{ $e->name }}</td>
                                <td>{{ $e->companies->name }}</td>
                                <td>{{ $e->email }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ url('/employee/'.$e->id.'/edit') }}"><button class="btn btn-warning mx-2">Edit</button></a>
                                    <form method="post" action="{{ url('employee') }}/{{ $e->id }}"> 
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-2 delete-button">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-end">{{ $employees->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection