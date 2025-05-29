@extends('front_end.layout.main')
@section('title', 'My Profile')
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
                                <form action="{{ route('profile.update') }}" method="POST" class="mt-60 ">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-sm-6">
                                            <input type="text" placeholder="First name"
                                                class="form-control para" name="first_name" id="name" required="required"
                                                autocomplete="off" value="{{ Auth::user()->first_name }}">
                                                @error('first_name')
                                                  <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <input type="text" placeholder="Last Name" class="form-control para"
                                                id="last-name" required="required" autocomplete="off" name="last_name" value="{{ Auth::user()->last_name }}">

                                            @error('last_name')
                                              <span class="text-danger">{{ $message }}</span>
                                            @enderror   
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <input type="email" placeholder="Email" class="form-control para"
                                                id="email" name="email" required="required" autocomplete="off" value="{{ Auth::user()->email }}">
                                            @error('email')
                                             <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <input type="number" placeholder="Phone" class="form-control para"
                                                id="phone" required="required" autocomplete="off" name="phone" value="{{ Auth::user()->phone  }}">
                                        </div>

                                        {{-- <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="Password"
                                                    class="form-control para" id="password-field"
                                                    required="required" autocomplete="off">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="mb-3 col-sm-6">
                                            <input type="password" placeholder="Confirm Password"
                                                class="form-control para" id="con_password" required="required">
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    {{-- <div class="reset-password">
                                        <a href="{{ route('profile.change.password') }}"> Reset Password </a>
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


@section('custom-script')

<script>

    $(document).ready(function() {
        $('#phone').on('input', function() {
            var value = $(this).val();
            if (value < 0) {
                $(this).val('');
            }
        });
    });

</script>


@endsection
