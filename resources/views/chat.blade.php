@extends('backend.partialadmin.layout')
@push('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/css/emoji.css" /> --}}
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
                            {{-- <div class="chat-sidebar-profile-toggle">
                                <div class="avatar">
                                    <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-11.png') }}" class="cursor-pointer" alt="user_avatar" height="36" width="36">
                                </div>
                            </div> --}}
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
                        {{-- <ul class="chat-sidebar-list">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-busy"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">Elizabeth Elliott</h6><span class="text-muted">Cake pie</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-7.png') }}" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">Kristopher Candy</h6><span class="text-muted">jelly jelly</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h6 class="px-2 pt-2 pb-25 mb-0">CONTACTS<i class="ft-plus float-right cursor-pointer"></i></h6> --}}
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
                    <!-- app chat window ends -->
                    <!-- app chat profile right sidebar start -->
                    {{-- <section class="chat-profile">
                        <header class="chat-profile-header text-center border-bottom">
                            <span class="chat-profile-close">
                                <i class="ft-x"></i>
                            </span>
                            <div class="my-2">
                                <img src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}" class="round mb-1" alt="chat avatar" height="100" width="100">
                                <h5 class="app-chat-user-name mb-0">Elizabeth Elliott</h5>
                                <span>Devloper</span>
                            </div>
                        </header>
                        <div class="chat-profile-content p-2">
                            <h6 class="mt-1">ABOUT</h6>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            <h6 class="mt-2">PERSONAL INFORMATION</h6>
                            <ul class="list-unstyled">
                                <li class="mb-25">email@gmail.com</li>
                                <li>+1(789) 950-7654</li>
                            </ul>
                        </div>
                    </section> --}}
                    <!-- app chat profile right sidebar ends -->

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/config.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/util.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/jquery.emojiarea.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/emoji-picker.js"></script> --}}
<script type="text/javascript">
    // Enter a unique channel you wish your users to be subscribed in.
    // var channel = pusher.subscribe('chat-channel');
    
    // var channel = pusher.subscribe('test_channel');
    // channel.bind('my_event', function(data) {
    channel.bind('chat-event', function(data) {
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
        console.log(data);
        // Scroll to the bottom of the container when a new message becomes available
        $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
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
        console.log(data);
        // Scroll to the bottom of the container when a new message becomes available
        $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
    }

    // AJAX request
    function ajaxCall(ajax_url, ajax_data) {
        $.ajax({
            type: "POST",
            url: ajax_url,
            dataType: "json",
            data: ajax_data,
            success: function(response, textStatus, jqXHR) {
                console.log(jqXHR.responseText);
                chatPushContainer(response);
            },
            error: function(msg) {
                // alert(msg);
            }
        });
    }
    
    // Trigger for the Enter key when clicked.
    $.fn.enterKey = function(fnc) {
        return this.each(function() {
            $(this).keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            });
        });
    }
    
    // Send the Message
    $('body').on('click', '#sendChat', function(e) {
        e.preventDefault();
        var chat_content = $('#chatInput').val();
        var receiver_id = $('#receiver_id').val();
        if (chat_message !== '') {
            // Define ajax data
            var chat_message = {
                receiver: receiver_id,
                message: chat_content
            }
            // Send the message to the server
            ajaxCall('tes-chat', chat_message);
            // Clear the message input field
            $('#chatInput').val('');
        }
    });
    
    // Send the message when enter key is clicked
    $('#chatInput').enterKey(function(e) {
        e.preventDefault();
        $('#sendChat').click();
    });

    $('.user-chat').click(function(){
        var id_user = $(this).attr('data-id');
        // alert('user id : '+id_user);
        $.ajax({
            url: 'tes-chat/'+id_user,
            type: 'GET',
            datatype: "html"
        }).done(function(data){
            $(".chat-area").empty().html(data);
            $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
            // $('#receiver_id').val(id_user);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
        });
    });
</script>
@endpush