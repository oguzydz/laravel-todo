@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Me</h3>
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

                <h3>Analytics</h3>
                <div class="card overflow-hidden">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          All Todo
                          <span class="badge bg-primary rounded-pill text-white">{{$analytics->allTodo}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Finished
                          <span class="badge bg-primary rounded-pill text-white">{{$analytics->finished}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Unfinished
                          <span class="badge bg-primary rounded-pill text-white">{{$analytics->unfinished}}</span>
                        </li>
                      </ul>
                </div>
            </div>

            <div class="col-md-8">
                <h3>Todo List</h3>
                <div class="card border">
                    <div class="card-body">
                        <div class="row">
                            @if ($noData === false)
                                @if ($type == 'list')
                                    <div class="table-responsive pb-4">
                                       <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    {{-- <th>Description</th> --}}
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($todoData->items() as $todoDetail)
                                                    <x-card :cardData="$todoDetail" />
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4 float-right col-12 align-items-end d-flex justify-content-end">
                                        {{$todoData->links()}}
                                    </div>
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
