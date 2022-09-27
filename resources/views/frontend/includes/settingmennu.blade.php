<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link {{Route::is('frontend.setting') ? 'active' : ''}}" href="{{route('frontend.setting')}}">Change Password</a>
    <a class="nav-item nav-link {{Route::is('frontend.change-email') ? 'active' : ''}}"  href="{{route('frontend.change-email')}}">Change Email</a>
    <a class="nav-item nav-link {{Route::is('frontend.profile-delete') ? 'active' : ''}}"  href="{{route('frontend.profile-delete')}}">Delete Profile</a>
   </div>
