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
                    <div class="card-header pb-0">
                        <h3 class="font-weight-bold">Notifikasi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Isi Notifikasi</th>
                                    <th>Tanggal/Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notification as $notif)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notif->message }}</td>
                                    <td>{{ Helper::datetime_indo($notif->created_at) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$notification->render("pagination::bootstrap-4")}}
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