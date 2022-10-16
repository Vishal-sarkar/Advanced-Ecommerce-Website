@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- -------------- Add Brand Page --------------- -->
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add State</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('state.update',$state->id)}}">
                                @csrf

                                <div class="form-group">
                                    <h5>Division Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Division</option>
                                            @foreach($divisions as $div)
                                            <option value="{{$div->id}}" {{ $div->id == $state->division_id ?'selected':''}}>{{$div->division_name}}</option>
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
                                    <h5>District Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="district_id" class="form-control">
                                            <option value="" selected="" disabled="">Select District</option>
                                            @foreach($districts as $dist)
                                            <option value="{{$dist->id}}" {{$dist->id == $state->district_id ? 'selected':''}}>{{$dist->district_name}}</option>
                                            @endforeach
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
                                    <h5>State Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="state_name" class="form-control" value="{{$state->state_name}}">
                                    </div>
                                    @error('state_name')
                                    <span class="text-danger" >
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