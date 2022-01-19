@extends('layouts.app', ['active' => 'employee'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>

                <div class="card-body">
                    <form action="{{ url('/employee/'.$employee->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employee->name) }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select class="custom-select d-block w-100" id="company" name="company" required>
                                @foreach($companies as $c)
                                    <option value="{{ $c->id }}" {{ old('company', $employee->company) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee->email) }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection