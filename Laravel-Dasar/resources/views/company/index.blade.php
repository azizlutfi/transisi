@extends('layouts.app', ['active' => 'company'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between mx-auto my-3">
                        <div class="col-6">
                            <button class="btn btn-outline-danger">Export PDF</button>
                            <button class="btn btn-outline-success">Import XLS</button>
                        </div>
                        <a href="{{ url('/company/create') }}"><button class="btn btn-success">Add Company</button></a>
                    </div>
                    @if($companies->isEmpty())
                        {{ __('No Data Available') }}
                    @else
                        <table class="table table-bordered">
                            <thead class="thead-dark">  
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($companies as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->logo }}</td>
                                <td>{{ $c->website }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ url('/employee/'.$c->id.'/edit') }}"><button class="btn btn-warning mx-2">Edit</button></a>
                                    <form method="post" action="{{ url('company') }}/{{ $c->id }}"> 
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-2 delete-button">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-end">{{ $companies->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection