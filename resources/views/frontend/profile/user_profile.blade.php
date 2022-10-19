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
                        class="text-danger">Hi....</span><strong>{{Auth::user()->name}} </strong> Welcome to Easy online
                    shop</h3>

                    <div class="card-body">
                <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Name <span>*</span></label>
                        <input type="text"  name="name"
                            class="form-control unicase-form-control text-input" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Email <span>*</span></label>
                        <input type="email"  name="email"
                            class="form-control unicase-form-control text-input" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Phone <span>*</span></label>
                        <input type="text"  name="phone"
                            class="form-control unicase-form-control text-input" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Iser Photo <span>*</span></label>
                        <input type="file"  name="profile_photo_path"
                            class="form-control unicase-form-control text-input">
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