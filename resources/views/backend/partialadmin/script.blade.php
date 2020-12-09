<script src="{{ asset('js/jquery.js') }}"></script>
{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
<script src="{{ asset('js/util.js') }}"></script>
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/charts/chart.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script> --}}
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
    var channel = pusher.subscribe('chat-channel.'+my_id);
    var notif_channel = pusher.subscribe('notif-channel.'+my_id);
    var presence_channel = pusher.subscribe('presence.channel');
    presence_channel.bind('presence-user', function(data){
        alert(data);
    });
    $('.select2').select2();
    $('.datatable').dataTable();
    notif_channel.bind('notif-event', function(data) {
        $('#notif-list').prepend(
        '<a href="#">'+
            '<div class="media">'+
                '<div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>'+
                '<div class="media-body">'+
                    '<h6 class="media-heading">Notifikasi</h6>'+
                    '<p class="notification-text font-small-3 text-muted">'+ data.message +'</p><small>'+
                        '<time class="media-meta text-muted" datetime="'+ data.time.date +'">'+ data.time.date +'</time></small>'+
                '</div>'+
            '</div>'+
        '</a>');
        $('#toast_notif').append(
        '<div class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">'+
            '<div class="toast-header">'+
                '<strong class="mr-auto">E-Care</strong>'+
                '<small class="text-muted">just now</small>'+
                '<button type="button" class="ml-2 mb-1 close-notif" data-dismiss="toast" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
                '</button>'+
            '</div>'+
            '<div class="toast-body">'+
                data.message +
            '</div>'+
        '</div>');
        notif_count += 1;
        $('#notification-count').text(notif_count);
        $('#notification-count').show();
        $('.toast').toast('show');
        console.log(data);
    });

    $('#notification-dropdown').click(function(){
        notif_count = 0;
        $('#notification-count').hide();
    });
    $('#notification-dropdown').click(function(){
        notif_count = 0;
        $('#notification-count').hide();
    });
    $('.close-notif').click(function(){
        $(this).parent().parent().remove();
    });
    /* window.onbeforeunload = function (event) {
        var message = 'Important: Please click on \'Save\' button to leave this page.';
        if (typeof event == 'undefined') {
            event = window.event;
        }
        if (event) {
            event.returnValue = message;
        }
        return message;
    }; */

</script>