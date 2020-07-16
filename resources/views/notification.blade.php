@extends('backend.partialadmin.layout')
@push('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/css/emoji.css" /> --}}
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper"> 
            <div class="content-body">
                <div class="card">
                    <div class="card-header">
                        <h3>Notification</h3>
                    </div>
                    <div class="card-body">
                    @foreach ($notification as $notif)
                        <li>{{ $notif->message }}</li>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
<script type="text/javascript">
    
</script>
@endpush