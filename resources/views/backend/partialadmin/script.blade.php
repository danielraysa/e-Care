<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/charts/chart.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/backend/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/backend/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('assets/backend/app-assets/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('assets/backend/app-assets/js/scripts/footer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/backend/app-assets/js/scripts/pages/appointment.js') }}"></script>
<!-- END: Page JS-->

<!-- END: Page JS-->
<script src="{{asset('assets/backend/app-assets/js/scripts/pages/app-chat.js')}}"></script> 
<script src="{{asset('js/select2.full.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/bootstrap.dataTables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>
    var my_id = {{ Auth::id() }};
    var notif_count = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Enter your own Pusher App key
    var pusher = new Pusher('8284629e5aa4b95ea203', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('chat-channel.{{ Auth::id() }}');
    var notif_channel = pusher.subscribe('notif-channel.{{ Auth::id() }}');
    $('.select2').select2();
    $('.datatable').dataTable();
    notif_channel.bind('notif-event', function(data) {
        $('#notif-list').append(
        '<a href="#">'+
            '<div class="media">'+
                '<div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>'+
                '<div class="media-body">'+
                    '<h6 class="media-heading">You have new order!</h6>'+
                    '<p class="notification-text font-small-3 text-muted">'+ data.message +'</p><small>'+
                        '<time class="media-meta text-muted" datetime="'+ data.time +'">'+ data.time +'</time></small>'+
                '</div>'+
            '</div>'+
        '</a>');
        notif_count += 1;
        $('#notification-count').text(notif_count);
        $('#notification-count').show();
        console.log(data);
    });

    $('#notification-dropdown').click(function(){
        notif_count = 0;
        $('#notification-count').hide();
    });
</script>