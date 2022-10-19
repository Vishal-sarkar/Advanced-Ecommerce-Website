@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2">
                
            </div><!-- end -->
            <div class="col-md-6">
                <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{Auth::user()->name}}</strong>Welcome to Easy online shop</h3>
            </div><!-- end -->
        </div>
    </div>
</div>

@endsection
