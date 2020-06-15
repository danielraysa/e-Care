@extends('layouts.new')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="h-100 card mt-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($all_users as $item)
                        <a href="#" class="list-group-item @if($loop->first) active @endif">
                            {{ $item->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="h-100 card card-primary mt-3">
                <div class="card-header" id="chat_title">Chat with Admin</div>
                <div class="card-body">
                    <chat-admin :messages="messages"></chat-admin>
                </div>
                <div class="card-footer">
                    {{-- <form id="formChat" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Send</button>
                              </span>
                        </div>
                    </form> --}}
                    <chat-fadmin
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-fadmin>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#formChat').submit(function(event){
        event.preventDefault();
        var message = $('input[name="message"]').val();
        
        $.ajax({
            url: "{{ url('chat/send') }}",
            type: "POST",
            data: {message: message},
            success: function(result){
                console.log(result);
                $('input[name="message"]').val('');
            }
        })
    });
</script>
@endpush
