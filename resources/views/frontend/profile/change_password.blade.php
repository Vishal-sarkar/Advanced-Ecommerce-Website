@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
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