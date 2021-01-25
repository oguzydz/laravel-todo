@extends('layouts.app')

@section('content')
    <div class="container">
        <x-title title="{!!  $title !!}" />
        <div class="row">
            @if ($type == 'list')
                <div class="table-responsive col-12">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todoData as $todoDetail)
                                    <x-card :cardData="$todoDetail" />
                                @endforeach
                            </tbody>
                    </div>
                </div>
                {{ $todoData->links() }}
            @else
                <div class="col-md-12">
                    <x-cardDetail :cardData="$todoData" />
                </div>
            @endif
        </div>
        @if (Session::get('success'))
            <x-alert message="{!!  Session::get('success') !!}" />
        @endif
    </div>
@endsection
