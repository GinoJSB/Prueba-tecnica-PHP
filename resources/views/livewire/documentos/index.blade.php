<!-- Vista inical donde se llaman de otros archivos para llenar la vista -->

@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('documentos')
        </div>     
    </div>   
</div>
@endsection