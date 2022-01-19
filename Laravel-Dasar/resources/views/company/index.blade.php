@extends('layouts.app', ['active' => 'company'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-end mx-auto my-3">
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
                                    <th>Employee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($companies as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->logo }}</td>
                                <td>{{ $c->website }}</td>
                                <td>
                                    <a href="{{ url('/company/'.$c->id.'/PDF') }}"><button class="btn btn-outline-danger mx-2">Export PDF</button></a>
                                    <a href="{{ url('') }}"><button class="btn btn-outline-success mx-2">Import XLS</button></a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ url('/company/'.$c->id.'/edit') }}"><button class="btn btn-warning mx-1">Edit</button></a>
                                    <form method="post" action="{{ url('company') }}/{{ $c->id }}"> 
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1">Remove</button>
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