@foreach ($users as $usr)
    <li class="{{ isset($selected_user) && $selected_user == $usr->id ? 'user-chat active' : 'user-chat' }}" data-id="{{ $usr->id }}">
        <div class="d-flex align-items-center">
            {{-- <div class="avatar m-0 mr-50"><img class="w-100 h-100" style="object-fit: cover;" src="{{ $mhs->foto_mhs() }}" height="36" width="36" alt="sidebar user image"> --}}
            <div class="avatar m-0 mr-50"><img class="w-100 h-100" style="object-fit: cover;" src="{{ $usr->foto_user() }}" height="36" width="36" alt="sidebar user image">
                <span class="avatar-status-away"></span>
            </div>
            <div class="chat-sidebar-name">
                {{-- <h6 class="mb-0">{{ $mhs->nama }}</h6><span class="text-muted">{{ $mhs->nim }}</span> --}}
                <h6 class="mb-0">{{ $usr->name }}</h6><span class="text-muted">{{ $usr->email }}</span>
            </div>
        </div>
    </li>
@endforeach