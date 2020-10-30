@extends('backend.partialadmin.layout')
@push('css')
    @if(request()->is('histori-chat'))
    <style>
    .chat-container {
        height: calc(100vh - 12.5rem) !important;
    }
    </style>
    @endif
@endpush
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="sidebar-left">
            <div class="sidebar">
                <!-- app chat sidebar start -->
                <div class="chat-sidebar card">
                    <span class="chat-sidebar-close">
                        <i class="ft-x"></i>
                    </span>
                    <div class="chat-sidebar-search">
                        <div class="d-flex align-items-center">
                            <fieldset class="form-group position-relative has-icon-left w-100 mb-0">
                                <input type="text" class="form-control round" id="chat-search" placeholder="Search">
                                <div class="form-control-position">
                                    <i class="ft-search text-dark"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="chat-sidebar-list-wrapper pt-2">
                        <h6 class="px-2 pb-25 mb-0">CHATS</h6>
                        <ul class="chat-sidebar-list">
                            @foreach ($users as $usr)
                            <li class="user-chat" data-id="{{ $usr->id }}">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar m-0 mr-50"><img class="w-100 h-100" style="object-fit: cover;" src="{{ $mhs->foto_mhs() }}" height="36" width="36" alt="sidebar user image"> --}}
                                    <div class="avatar m-0 mr-50"><img class="w-100 h-100" style="object-fit: cover;" src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-away"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        {{-- <h6 class="mb-0">{{ $mhs->nama }}</h6><span class="text-muted">{{ $mhs->nim }}</span> --}}
                                        <h6 class="mb-0">{{ $usr->name }}</h6><span class="text-muted">{{ $usr->email }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- app chat sidebar ends -->
            </div>
        </div>
        <div class="content-right">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- app chat overlay -->
                    <div class="chat-overlay"></div>
                    <!-- app chat window start -->
                    <section class="chat-window-wrapper">
                        <div class="chat-start">
                            <span class="ft-message-square chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
                            <h4 class="d-none d-lg-block py-50 text-bold-500">Select a contact to start a chat!</h4>
                            <button class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
                                Conversation!</button>
                        </div>
                        <div class="chat-area d-none">
                            @include('chat-card')
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
<script type="text/javascript">
    // Enter a unique channel you wish your users to be subscribed in.
    // var channel = pusher.subscribe('chat-channel');
    
    // var channel = pusher.subscribe('test_channel');
    // channel.bind('my_event', function(data) {
    channel.bind('chat-event', function(response) {
        // Add the new message to the container
        // var url_image = "{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}";
        chatPushContainer(response);
    });
    
    function chatPushContainer(data){
        // Add the new message to the container
        // var url_image = "{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}";
        if(data.user_id != my_id){
            var class_left = 'chat-left';
        }else{
            var class_left = '';
        }
        $('.chat-content').append(
        '<div class="chat '+ class_left +'">'+
            '<div class="chat-body">'+
                '<div class="chat-message">'+
                    '<p>'+ data.message + '</p>'+
                    '<span class="chat-time">'+ data.time +'</span>'+
                '</div>'+
            '</div>'+
        '</div>');
        // Scroll to the bottom of the container when a new message becomes available
        // $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
        $(".chat-container").scrollTop($(".chat-container > .chat-content").height());
    }

    // AJAX request
    function ajaxCall(ajax_url, ajax_data) {
        $.ajax({
            type: "POST",
            url: ajax_url,
            dataType: "json",
            data: ajax_data,
            success: function(response, textStatus, jqXHR) {
                console.log(response);
                chatPushContainer(response);
            },
            error: function(response, textStatus, jqXHR) {
                // alert(response);
            }
        });
    }

    $('.user-chat').click(function(){
        var id_user = $(this).attr('data-id');
        // alert('user id : '+id_user);
        $.ajax({
            url: "{{ route('chat') }}/"+id_user,
            type: 'GET',
            datatype: "html"
        }).done(function(data){
            $(".chat-area").empty().html(data);
            // $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
            $(".chat-container").scrollTop($(".chat-container > .chat-content").height());
            // $('#receiver_id').val(id_user);
            $('#footer-chat').addClass('d-none');
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
        });
    });
</script>
@endpush