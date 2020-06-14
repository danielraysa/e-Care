@extends('layouts.new')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="h-100 card">
                <div class="card-body">
                    <div class="nav-item">
                        <a href="../calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                        </a>
                    </div>
                    <li class="nav-item">
                        <a href="{{ url('chat') }}" class="nav-link">
                        <i class="nav-icon far fa-comments"></i>
                        <p>
                            Chat
                        </p>
                        </a>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary mt-3">
                <div class="card-header">Chat with Admin</div>
                {{-- <div class="card-heading">
                    <h5 class="box-title">Direct Chat</h5>
                </div> --}}

                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Alexander Pierce</span>
                            <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
        
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            You better believe it!
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                    </div>
                    <!--/.direct-chat-messages-->
                        
                </div>
                <div class="card-footer">
                    <form id="formChat" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Send</button>
                              </span>
                        </div>
                    </form>
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
