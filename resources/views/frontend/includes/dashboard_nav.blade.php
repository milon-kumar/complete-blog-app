<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="button mb-2"
       style="{{Route::is('frontend.dashboard') ? 'background:#ff9907;color: #000022; ' : ''}}"
       href="{{route('frontend.dashboard')}}">Dashboard</a>

  <a class="button mb-2"
       style="{{Route::is('frontend.profile') ? 'background:#ff9907;color: #000022; ' : ''}}"
       href="{{route('frontend.profile')}}">Profile</a>

    <a class="button mb-2"
       style="{{Route::is('frontend.comment') ? 'background:#ff9907;color: #000022; ' : ''}}"
       href="{{route('frontend.comment')}}">Comments</a>

    <a class="button mb-2"
       style="{{Route::is('frontend.message') ? 'background:#ff9907;color: #000022; ' : ''}}"
       href="{{route('frontend.message')}}">Messages</a>

    <a class="button mb-2"
       style="{{Route::is('frontend.setting') ? 'background:#ff9907;color: #000022; ' : ''}}"
       href="{{route('frontend.setting')}}">Settings</a>
</div>
