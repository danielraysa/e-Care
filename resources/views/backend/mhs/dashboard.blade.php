@extends('backend.partialadmin.layout')
@section('content')
    

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <h3>Selamat Datang</h3>
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection