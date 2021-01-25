@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">{{ __('New Todo') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('todo-list') }}">{{ __('Todo') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('New Todo') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ __('Create New Todo') }}</h4>
                        <hr style="border-top: 2px solid rgb(85, 85, 85);">
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title') }}" required autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Description') }}</label>
                                        <textarea class="form-control @error('desc') is-invalid @enderror" id="desc"
                                            name="desc" value="{{ old('desc') }}" required autofocus rows="5"></textarea>
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Image') }}</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"
                                    style="background: #224686; border: none;"><i class="mdi mdi-plus mr-1"></i>
                                    {{ __('Create') }}</button>
                                <a href="{{ route('index') }}">
                                    <button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"
                                        style="background: #224686; border: none;"><i class="mdi mdi-arrow-left mr-1"></i>
                                        {{ __('Go Back') }}</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
