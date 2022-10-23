@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{route('post-store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <!--------- // 2nd Row // --------->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title En<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title_en" class="form-control"
                                                        required="">
                                                    @error('post_title_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title hin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title_hin" class="form-control"
                                                        required="">
                                                    @error('post_title_hin')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 2nd Row // --------->
                                    <!--------- //  6th Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Blog Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Blog Category
                                                        </option>
                                                        @foreach($blogCategory as $category)
                                                        <option value="{{$category->id}}">
                                                            {{$category->blog_category_name_en}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Main Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image" class="form-control"
                                                        onChange="mainThamUrl(this)" required="">
                                                    @error('post_image')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 6th Row // --------->
                                    <!--------- //  8th Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="post_details_en" rows="10" cols="80"
                                                        required="">
                                                        Post Details English</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="post_details_hin" rows="10" cols="80"
                                                        required="">
                                                        Post Details Hindi</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 8th Row // --------->
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" value="Add Post" class="btn btn-rounded btn-primary mb-5">
                            </div>

                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>



<script type="text/javascript">
function mainThamUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThmb').attr('src', e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>


@endsection