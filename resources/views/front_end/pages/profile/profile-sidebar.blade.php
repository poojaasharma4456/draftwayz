<div class="profile-side">
    <div class="profile-sec">
        <div class="user-img">
            {{-- <div class="update_img_user">
                <img src="assets/images/player1.png" alt="user_img">
                <span class="edit_pan"><img src="./assets/images/profile-pen.png" class="profile-pen"  alt=""> </span>
            </div> --}}


            <div class="update_img_user">
                <img src="{{(!empty(Auth::user()->image)) ? asset(Auth::user()->image) : asset('assets/images/user-img.png') }}" alt="user_img">

                <form id="profile-pic-form" action="{{ route('profile.update-pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="profile-pic-input" name="profile_picture" style="display: none;" accept="image/*" onchange="document.getElementById('profile-pic-form').submit()">
                    <span class="edit_pan">

                        <img src="{{asset('assets/images/profile-pen.png')}}" onclick="document.getElementById('profile-pic-input').click()" class="profile-pen"  alt="">
                        
                        {{-- <i class="fa-solid fa-pen" aria-hidden="true" ></i> --}}
                    
                    </span>
                </form>
            </div>

            <div class="user_name">
                <h3>{{ ucfirst(Auth::user()->first_name.' '.Auth::user()->last_name) }} </h3>
            </div>
        </div>
        <div class="edit_option_bar">
            <div class="content-bar">
                <span class="tabedit">
                    <a href="{{route('profile.profile')}}">Edit Profile</a>
                </span>
            </div>
            <div class="content-bar">
                <span class="tabedit">
                    <a href="{{route('profile.change.password')}}">Change Password</a>
                </span>
            </div>
        </div>
    </div>
</div>