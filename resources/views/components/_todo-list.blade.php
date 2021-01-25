@extends('layouts.app')

@section('content')
    <div class="container">
        <x-title title="{!! $title !!}"/>
        <div class="row">
            @if($type == 'list')
                @foreach ($todoData as $todoDetail)
                    <div class="col-xl-4 col-sm-6">
                        <x-card :cardData="$todoDetail" class="card"/>
                    </div>
                @endforeach
                {{ $todoData->links() }}
            @else
                <div class="col-md-12">
                    <x-cardDetail :cardData="$todoData"/>
                </div>
            @endif
        </div>
        @if(Session::get('success'))
            <x-alert message="{!! Session::get('success') !!}"/>
        @endif
    </div>
@endsection


