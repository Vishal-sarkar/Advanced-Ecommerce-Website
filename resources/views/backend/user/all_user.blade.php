@extends('admin.admin_master')
@section('admin')




<!-- Content Wrapper. Contains page content -->
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All User <span class="badge badge-pill badge-danger">{{count($users)}}</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                        <td><img class="card-img-top" style="border-radius:50%"
                                                src="{{(!empty($item->profile_photo_path))?url('upload/user_images/'.$item->profile_photo_path):url('upload/no_image.jpg')}}"
                                                height="50px" width="50px">
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email }}</td>
                                        <td>{{$item->phone }}</td>
                                        <td>
                                            @if($item->UserOnline())
                                            <span class="badge badge-pill badge-success">Active Now</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($item->last_seen)->diffForHumans()}}</span>
                                            @endif
                                            
                                        </td>

                                        <td>
                                            <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info"
                                                title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger"
                                                id="delete" title="Delete Data"><i class="fa fa-trash"></i</a>
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->






@endsection