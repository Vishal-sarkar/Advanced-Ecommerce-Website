@extends('admin.admin_master')
@section('admin')




<!-- Content Wrapper. Contains page content -->
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupon List <span class="badge badge-pill badge-danger">{{count($coupons)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Validity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $item)
                                    <tr>
                                        <td width="25%">{{$item->coupon_name}}</td>
                                        <td>{{$item->coupon_discount}}%</td>
                                        <td width="25%">
                                        {{Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y')}}
                                            
                                        </td>
                                        <td>
                                        @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-pill badge-success">Valid</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Invalid</span>
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{route('coupon.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('coupon.delete',$item->id)}}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <!-- -------------- Add Brand Page --------------- -->
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('coupon.store')}}">
                                @csrf

                                <div class="form-group">
                                    <h5>Coupon Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_name" class="form-control">
                                    </div>
                                    @error('coupon_name')
                                    <span class="text-danger" >
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_discount" class="form-control">
                                    </div>
                                    @error('coupon_discount')
                                    <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="coupon_validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                    @error('coupon_validity')
                                    <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" value="Add New" class="btn btn-rounded btn-primary mb-5">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- -------------- End Add Brand Page --------------- -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->






@endsection