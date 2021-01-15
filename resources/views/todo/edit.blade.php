@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">{{ __('Todo Edit') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('Todo') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Todo Edit') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        @if ($todoData)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('Edit Your Todo') }}</h4>
                            <hr style="border-top: 2px solid rgb(85, 85, 85);">
                            <form action="{{ route('update', $todoData->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $todoData->title }}" required autofocus>
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
                                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" required autofocus rows="5">{{ $todoData->desc }}</textarea>
                                            @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="5" {{ $todoData->status == '5' ? 'selected' : '' }}>Unfinish</option>
                                                <option value="1" {{ $todoData->status == '1' ? 'selected' : '' }}>Finish</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> -->
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-plus mr-1"></i> {{ __('Update') }}</button>
                                    <a href="{{ route('detail', $todoData->id) }}">
                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-arrow-left mr-1"></i> {{ __('Go Back') }}</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h1 class="display-2 font-weight-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                            <h4 class="text-uppercase">Sorry, page not found</h4>
                            <div class="mt-5 text-center">
                                <a href="{{ route('todo-list') }}">
                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-arrow-left mr-1"></i> {{ __('Go Back') }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
