<style>
    .emojionearea .emojionearea-editor {
        min-height: 3rem;
    }
</style>
@if(isset($user_receiver))
<div class="chat-header">
    <header class="d-flex justify-content-between align-items-center px-1 py-75">
        <div class="d-flex align-items-center">
            <div class="chat-sidebar-toggle d-block d-lg-none mr-1"><i class="ft-align-justify font-large-1 cursor-pointer"></i>
            </div>
            <div class="avatar chat-profile-toggle m-0 mr-1">
                <img id="chat-user-photo"src="{{ $user_receiver->foto_user() }}" class="cursor-pointer" alt="avatar" height="36" width="36" />
                <span class="avatar-status-busy"></span>
            </div>
            <div class="d-block">
                <h6 class="m-0" id="chat-name">
                    {{ $user_receiver->name }}
                </h6>
                <small id="online-status" class="{{ $user_receiver->isOnline() ? 'text-success' : '' }}">{{ $user_receiver->isOnline() ? 'Online' : $user_receiver->lastSeenOnline() }}</small>
            </div>
        </div>
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
        <div class="chat-header-icons">
            <span class="dropdown">
                <i class="ft-more-vertical font-medium-4 ml-25 cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </i>
                <span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item make-appointment" id="send-link" data-id="{{ $user_receiver->id }}" href="#" data-url="{{ route('daftar-konseling') }}"><i class="ft-tag mr-25"></i> Kirim Link Appointment</a>
                    @if(isset($last_appointment) && $last_appointment->status == 'Y')
                    <a class="dropdown-item" id="end-chat" data-add="{{ route('tambah-rekam', $last_appointment->id) }}" data-url="{{ route('appointment.end-chat', $user_receiver->id) }}" href="JavaScript:void(0);"><i class="ft-check mr-25"></i> Selesai</a>
                    @endif
                </span>
            </span>
        </div>
        @endif
    </header>
</div>
{{-- @include('chat-card') --}}
<div class="card chat-wrapper shadow-none mb-0">
    <div class="card-content">
        <div class="card-body chat-container ps">
            <div class="chat-content">
                <!-- chat message -->
            @if(isset($messages))
            @for($i = 0; $i < $messages->count(); $i++)
                @if($i == 0)
                <div class="row">
                    <div class="col-sm-12">
                    <div class="badge badge-pill badge-primary">{{ date('d/m/Y', strtotime($messages[$i]->created_at)) }}</div>
                    </div>
                </div>
                @elseif(date('d/m/Y', strtotime($messages[$i]->created_at)) != date('d/m/Y', strtotime($messages[$i-1]->created_at)))
                <div class="row">
                    <div class="col-sm-12">
                    <div class="badge badge-pill badge-primary">{{ date('d/m/Y', strtotime($messages[$i]->created_at)) }}</div>
                    </div>
                </div>
                @endif
                @if($messages[$i]->user_id == Auth::id())
                <div class="chat">
                @else
                <div class="chat chat-left">
                @endif
                    <div class="chat-body">
                        <div class="chat-message">
                            <p>{{ $messages[$i]->message }}</p>
                            <span class="chat-time">{{ date('H:i', strtotime($messages[$i]->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            @endfor
            @endif
                </div>
            </div>
        </div>
        <div id="footer-chat" class="card-footer chat-footer px-2 py-1 pb-0">
            <form class="d-flex align-items-center" action="javascript:void(0);">
                {{-- <i class="ft-user cursor-pointer"></i> --}}
                {{-- <i class="ft-paperclip ml-1 cursor-pointer"></i> --}}
                {{-- <i class="far fa-laugh cursor-pointer emoji"></i> --}}
                {{-- <input type="text" id="chatInput" data-emojiable="true" class="form-control chat-message-send mx-1" placeholder="Type your message here..."> --}}
                <textarea type="text" id="chatInput" data-emojiable="true" class="form-control chat-message-send mx-1" placeholder="Type your message here..."></textarea>
                <input type="hidden" id="receiver_id" value="{{ $user_receiver->id }}"/>
                <button type="submit" id="sendChat" class="btn btn-primary glow send d-lg-flex"><i class="ft-play"></i>
                    <span class="d-none d-lg-block mx-50">Send</span></button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('assets/backend/app-assets/js/scripts/pages/app-chat.js')}}"></script>
<script>
    $("#chatInput").emojioneArea({
        pickerPosition: "top",
        tonesStyle: "bullet",
    });
    var chat_user_user = new PerfectScrollbar(".chat-container");
    $('#end-chat').click(function(){
        var link = $(this).attr('data-url');
        var next_link = $(this).attr('data-add');
        $.ajax({
            url: link,
            type: 'POST',
            success: function(result){
                console.log(result);
                // alert(result);
                window.location.href = next_link;
            },
            error: function(jqXHR, ajaxOptions, thrownError){
                console.log(thrownError);
                alert(thrownError);
            }
        });
    });
    $('#send-link').click(function(){
        var link = $(this).attr('data-url');
        $('#chatInput').val(link);
        $('#sendChat').click();
    });
</script>
@endif