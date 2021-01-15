@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary"> {{ __('Welcome, ') . Auth::user()->name }}</h5>
                                    <p>{{ __('Dashboard') }}</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light text-black-50">
                                        <img src="{{ asset('images/user.png') }}" class="w-50" alt="" class="img-fluid">
                                    </span>
                                </div>
                                <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-0 text-truncate">{{ Auth::user()->email }}</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border">
                    <div class="card-header">
                        <h5>Your Todo List</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if ($noData === false)
                                @if ($type == 'list')
                                    @foreach ($todoData as $todoDetail)
                                        <div class="col-xl-4 col-sm-6">
                                            <x-card :cardData="$todoDetail" class="card" />
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">
                                        <x-cardDetail :cardData="$todoData" />
                                    </div>
                                @endif
                            @else
                                <x-responseMessage :msg="$msg" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
