@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-3">
                    <h4 class="text-uppercase font-weight-bold">{{ $error }}</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-md waves-effect waves-light" href="{{ route('index') }}"><i class="mdi mdi-arrow-left ml-1"></i> Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="{{ asset('images/error-img.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
