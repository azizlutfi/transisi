@extends('layouts.app', ['active' => 'dashboard'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="d-grid py-3">
                        <a href="{{ url('/company') }}">
                            <button class="col-12 btn btn-primary mb-3 py-4 px-4" type="button"><span class="display-4"> Company </span></button>
                        </a>
                        <a href="{{ url('/employee') }}">
                            <button class="col-12 btn btn-primary mb-3 py-4 px-4" type="button"><span class="display-4"> Employee </span></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
