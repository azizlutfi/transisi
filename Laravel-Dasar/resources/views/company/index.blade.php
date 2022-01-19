@extends('layouts.app', ['active' => 'company'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
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
                                    <button class="button-import btn btn-outline-success mx-2" data-toggle="modal" data-target="#modalImport" data-id="{{ $c->id }}" data-company="{{ $c->name}}">Import XLS</button>
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

<!-- Modal -->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImport" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/company/importEmployees') }}" id="import-form" method="post" enctype="multipart/form-data">
            @csrf
            <center><h4 class="perusahaan py-3"></h4></center>
            <div class="form-group">
                <input type="hidden" name="id_company" id="id_company" class="id_company" name="id_company">
                <div class="form-group">
                    <input id="excel" type="file" class="form-control-file excel" name="excel" required>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('import-form').submit();">Import</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('.button-import').click(function() {
        var company = $(this).data('company');
        var id = $(this).data('id');

        $('.perusahaan').text('Import Data Pegawai '+company);
        $('.id_company').val(id);
    });
</script>
@endsection