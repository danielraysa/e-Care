@extends('backend.partialadmin.layout')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css" />
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
                    <div class="chat-sidebar-list-wrapper">
                        <h6 class="px-2 pb-25 mt-50 mb-0">CHATS</h6>
                        <ul class="chat-sidebar-list">
                            @include('chat-list')
                            {{-- @foreach ($users as $usr)
                            <li class="user-chat" data-id="{{ $usr->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="avatar m-0 mr-50"><img class="w-100 h-100" style="object-fit: cover;" src="{{ $usr->foto_user() }}" height="36" width="36" alt="sidebar user image">
                                        <span class="avatar-status-away"></span>
                                    </div>
                                    <div class="chat-sidebar-name">
                                        <h6 class="mb-0">{{ $usr->name }}</h6><span class="text-muted">{{ $usr->email }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach --}}
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
<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
<script type="text/javascript">
    // Enter a unique channel you wish your users to be subscribed in.
    // var channel = pusher.subscribe('chat-channel');
    var user_selected = null;
    channel.bind('chat-event', function(response) {
        // Add the new message to the container
        // var url_image = "{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}";
        // console.log(response);
        getChatList(user_selected);
        if(respose.receiver_id == user_selected){
            chatPushContainer(response);
        }
    });
    
    function getChatList(selectedUser = null){
        $.ajax({
            url: "{{ route('chat') }}",
            type: "get",
            datatype: "html",
            data: {id_selected: selectedUser}
        }).done(function(data){
            $(".chat-sidebar-list").empty().html(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
            console.log(jqXHR);
            console.log(ajaxOptions);
            console.log(thrownError);
        });
    }

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
    
    // Trigger for the Enter key when clicked.
    /* $.fn.enterKey = function(fnc) {
        return this.each(function() {
            $(this).keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            });
        });
    } */
    
    // Send the Message
    $('body').on('click', '#sendChat', function(e) {
        e.preventDefault();
        var chat_content = $('#chatInput').val();
        var receiver_id = $('#receiver_id').val();
        // alert(chat_content);
        if (chat_message != '') {
            // Define ajax data
            var chat_message = {
                receiver: receiver_id,
                message: chat_content
            }
            // Send the message to the server
            ajaxCall("{{ route('send-chat') }}", chat_message);
            // Clear the message input field
            $('#chatInput').val('');
        }
    });
    
    // Send the message when enter key is clicked
    /* $('#chatInput').keypress(function(e) {
        e.preventDefault();
        if(e.ctrlKey && e.enterKey){
            $('#sendChat').click();
        }
    }); */

    $('body').on('click','.user-chat', function(){
        var id_user = $(this).attr('data-id');
        // alert('user id : '+id_user);
        user_selected = id_user;
        $.ajax({
            url: "{{ route('chat') }}/"+id_user,
            type: 'GET',
            datatype: "html"
        }).done(function(data){
            $(".chat-area").empty().html(data);
            // $(".chat-container").scrollTop($(".chat-container")[0].scrollHeight);
            $(".chat-container").scrollTop($(".chat-container > .chat-content").height());
            // $('#receiver_id').val(id_user);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
        });
    });
</script>
@endpush