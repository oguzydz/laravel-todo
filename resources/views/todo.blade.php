@extends('layouts.app')

@section('content')
    <div class="container">
        <x-TodoList :type="$type" :todoData="$todoData" :title="$title" />  
    </div>   
@endsection