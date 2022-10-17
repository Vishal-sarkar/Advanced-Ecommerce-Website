@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('title')
My Checkout Page
@endsection
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                        <span>1</span>Checkout Method
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <h4 class="checkout-subtitle"><strong> Shipping Address:</strong></h4>
                                        <hr>
                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <form class="register-form" role="form">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Name</b>
                                                        <span>*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Full Name"
                                                        value="{{Auth::user()->name}}" required="">
                                                </div><!-- // End form group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Email</b>
                                                        <span>*</span></label>
                                                    <input type="email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="email@gmail.com"
                                                        value="{{Auth::user()->email}}" required="">
                                                </div><!-- // End form group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>
                                                        <span>*</span></label>
                                                    <input type="number"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Phone"
                                                        value="{{Auth::user()->phone}}" required="">
                                                </div><!-- // End form group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Post Code</b>
                                                        <span>*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Post Code" required="">
                                                </div><!-- // End form group -->
                                                <button type="submit"
                                                    class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                            </form>
                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <form class="register-form" role="form">
                                                @csrf

                                                <div class="form-group">
                                                    <h5><b>Division Select </b><span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select Division
                                                            </option>
                                                            @foreach($divisions as $div)
                                                            <option value="{{$div->id}}">{{$div->division_name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                        <span class="text-danger">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5><b>District Select </b><span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select District
                                                            </option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5><b>State Name </b><span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="state_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select State
                                                            </option>

                                                        </select>
                                                        @error('state_id')
                                                        <span class="text-danger">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1"><b>Notes</b>
                                                        <span>*</span></label>
                                                    <textarea name="notes" id="" cols="30" rows="4" class="form-control"
                                                        placeholder="Notes"></textarea>
                                                </div><!-- // End form group -->

                                            </form>
                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->


                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Details</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Image:</strong>
                                            <img src="{{asset($item->options->image)}}"
                                                style="height:50px; width: 50px;">
                                        </li>
                                        <li>
                                            <strong>Qty:</strong>
                                            ({{$item->qty}})|

                                            <strong>Color:</strong>
                                            {{$item->options->color}}|

                                            <strong>Size:</strong>
                                            {{$item->options->size}}
                                        </li>
                                        <hr>
                                        @endforeach

                                        <li>
                                            @if (Session::has('coupon'))
                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Coupon Name: </strong> {{ session()->get('coupon')['coupon_name']}}
                                            ({{ session()->get('coupon')['coupon_discount']}}%)
                                            <hr>

                                            <strong>Coupon Discount: </strong>
                                            ${{ session()->get('coupon')['discount_amount']}}
                                            <hr>

                                            <strong>Grand Total: </strong>
                                            ${{ session()->get('coupon')['total_amount']}}
                                            <hr>

                                            @else

                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Grand Total: </strong> ${{ $cartTotal }}
                                            <hr>

                                            @endif
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->



<div class="container">
    @include('frontend.body.brands')
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('select[name="division_id"]').on('change', function() {
        var division_id = $(this).val();
        if (division_id) {
            $.ajax({
                url: "{{  url('/shipping/district/ajax') }}/" + division_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="state_id"]').empty();
                    var d = $('select[name="district_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="district_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .district_name + '</option>');
                    });
                    

                },
            });
        } else {
            alert('danger');
        }
    });

    $('select[name="district_id"]').on('click', function() {
        var district_id = $(this).val();
        if (district_id) {
            $.ajax({
                url: "{{  url('/shipping/state/ajax') }}/" + district_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="state_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="state_id"]').append(
                        '<option value="' + value.id + '">' + value
                        .state_name + '</option>');
                });
                },
            });
        } else {
            alert('No district Available');
        }
    });

    
});
</script>



@endsection