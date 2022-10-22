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
                        <h3 class="box-title">Division List <span class="badge badge-pill badge-danger">{{count($divisions)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $item)
                                    <tr>
                                        <td width="25%">{{$item->division_name}}</td>
                                        
                                        <td width="25%">
                                            <a href="{{route('division.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('division.delete',$item->id)}}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i</a>
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
                            <form method="post" action="{{route('division.store')}}">
                                @csrf

                                <div class="form-group">
                                    <h5>Division Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="division_name" class="form-control">
                                    </div>
                                    @error('division_name')
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