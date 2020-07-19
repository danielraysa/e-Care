@if(isset($user_receiver))
<div class="chat-header">
    <header class="d-flex justify-content-between align-items-center px-1 py-75">
        <div class="d-flex align-items-center">
            <div class="chat-sidebar-toggle d-block d-lg-none mr-1"><i class="ft-align-justify font-large-1 cursor-pointer"></i>
            </div>
            <div class="avatar chat-profile-toggle m-0 mr-1">
                <img id="chat-user-photo"src="{{ asset('assets/backend/app-assets/images/portrait/small/avatar-s-26.png') }}" class="cursor-pointer" alt="avatar" height="36" width="36" />
                <span class="avatar-status-busy"></span>
            </div>
            <h6 class="mb-0" id="chat-name">
                {{ $user_receiver->name }}
            </h6>
        </div>
        {{-- <div class="chat-header-icons">
            <span class="chat-icon-favorite">
                <i class="ft-star font-medium-5 cursor-pointer"></i>
            </span>
            <span class="dropdown">
                <i class="ft-more-vertical font-medium-4 ml-25 cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </i>
                <span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="JavaScript:void(0);"><i class="ft-tag mr-25"></i> Pin to top</a>
                    <a class="dropdown-item" href="JavaScript:void(0);"><i class="ft-trash-2 mr-25"></i> Delete chat</a>
                    <a class="dropdown-item" href="JavaScript:void(0);"><i class="ft-x-circle mr-25"></i> Block</a>
                </span>
            </span>
        </div> --}}
    </header>
</div>
{{-- @include('chat-card') --}}
<div class="card chat-wrapper shadow-none mb-0">
    <div class="card-content">
        <div class="card-body chat-container ps">
            <div class="chat-content">
                <!-- chat message -->
            @if(isset($messages))
            @foreach ($messages as $msg)
                @if($loop->first)
                <div class="row">
                    <div class="col-sm-12">
                    <div class="badge badge-pill badge-primary">{{ date('d/m/Y', strtotime($msg->created_at)) }}</div>
                    </div>
                </div>
                {{-- @elseif(!$loop->first && date('d/m/Y', strtotime($msg->created_at)))
                <div class="row">
                    <div class="col-sm-12">
                    <div class="badge badge-pill badge-primary">{{ date('d/m/Y', strtotime($msg->created_at)) }}</div>
                    </div>
                </div> --}}
                @endif
                @if($msg->user_id == Auth::id())
                <div class="chat">
                @else
                <div class="chat chat-left">
                @endif
                    <div class="chat-body">
                        <div class="chat-message">
                            <p>{{ $msg->message }}</p>
                            <span class="chat-time">{{ date('H:i', strtotime($msg->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
    <div class="card-footer chat-footer px-2 py-1 pb-0">
        <form class="d-flex align-items-center" onsubmit="chatMessagesSend();" action="javascript:void(0);">
            {{-- <i class="ft-user cursor-pointer"></i> --}}
            {{-- <i class="ft-paperclip ml-1 cursor-pointer"></i> --}}
            <i class="far fa-laugh cursor-pointer emoji"></i>
            <input type="text" id="chatInput" data-emojiable="true" class="form-control chat-message-send mx-1" placeholder="Type your message here...">
            <input type="hidden" id="receiver_id" value="{{ $user_receiver->id }}"/>
            <button type="submit" id="sendChat" class="btn btn-primary glow send d-lg-flex"><i class="ft-play"></i>
                <span class="d-none d-lg-block mx-50">Send</span></button>
        </form>
    </div>
</div>
@endif