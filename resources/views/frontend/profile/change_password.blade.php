@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img class="card-img-top" style="border-radius:50%"
                    src="{{(!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}"
                    height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div><!-- end -->
            <div class="col-md-2">

            </div><!-- end -->
            <div class="col-md-6">
                <h3 class="text-center"><span
                        class="text-danger">Change Password</span>
                    </h3>

                    <div class="card-body">
                <form method="post" action="{{route('user.password.update')}}" >
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Current Password </label>
                        <input type="password" id="current_password" name="oldpassword"
                            class="form-control unicase-form-control text-input" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">New Password </label>
                        <input type="password"  name="password" id="password"
                            class="form-control unicase-form-control text-input" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Confirm Password </label>
                        <input type="password" id="password_confirmation"  name="password_confirmation"
                            class="form-control unicase-form-control text-input" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
            </div><!-- end -->


            

        </div>
    </div>
</div>

@endsection