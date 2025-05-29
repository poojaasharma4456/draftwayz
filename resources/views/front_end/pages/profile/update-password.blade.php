@extends('front_end.layout.main')
@section('title', 'Update Profile')
@section('content')

<section class="my-profile">
    <div class="container">
        <div class="mmy-profile-inner">
            
            @include('front_end.pages.profile.profile-sidebar')
            
            <div class="col-sec">
               
                <div class="user-content-update">
                    @if(Session::has('success'))
                        <span class="alert alert-success col-md-12 text-center profile-success">{{ Session::get('success')  }}</span>
                    @endif
                    <div class="">
                        <div class="tab-content tab-content-1 active">
                            <div class="user-content-box">
                                <form action="{{ route('profile.update.password') }}" method="POST" class="mt-60 ">
                                    @csrf
                                    <div class="row">
                                      
                                        <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="Password"
                                                    class="form-control para" id="password-field"
                                                     autocomplete="off" name="current_password">
                                                @error("current_password")
                                                     <span class="text-danger" style="color: red;">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="New Password"
                                                    class="form-control para" id="password-field"
                                                     autocomplete="off" name="new_password">
                                                @error("new_password")
                                                     <span class="text-danger" style="color: red;">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="Confirm Password"
                                                    class="form-control para" id="password-field"
                                                     autocomplete="off" name="new_password_confirmation">
                                                
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>

                                    {{-- <div class="reset-password">
                                        <a href="#"> Reset Password </a>
                                    </div> --}}

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   
@endsection
