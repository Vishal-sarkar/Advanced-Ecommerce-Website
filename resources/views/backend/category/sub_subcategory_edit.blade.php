@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="container-full">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- -------------- Add Brand Page --------------- -->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">update Sub-SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('subsubcategory.update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$subsubcategories->id}}" >
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $subsubcategories->category_id ? 'selected':''}}>{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>
                                            @foreach($subcategories as $subsub)
                                            <option value="{{$subsub->id}}" {{$subsub->id == $subsubcategories->subcategory_id ? 'selected':''}}>{{$subsub->subcategory_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_en" class="form-control" value="{{$subsubcategories->subsubcategory_name_en}}">
                                    </div>
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>Sub-SubCategory Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subsubcategory_name_hin" class="form-control" value="{{$subsubcategories->subsubcategory_name_hin}}">
                                    </div>
                                    @error('subsubcategory_name_hin')
                                    <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" value="Update" class="btn btn-rounded btn-primary mb-5">
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