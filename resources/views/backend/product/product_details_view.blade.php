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

                            <div class="row">
                                <div class="col-12">
                                    <!--------- // 1st Row // --------->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Brand
                                                        </option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}"
                                                            {{$brand->id == $products->brand_id ? 'selected' : ''}}>
                                                            {{$brand->brand_name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                            {{$category->id == $products->category_id ? 'selected' : ''}}>
                                                            {{$category->category_name_en}}</option>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Sub-Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Sub-Category
                                                        </option>
                                                        @foreach($subcategory as $sub)
                                                        <option value="{{$sub->id}}"
                                                            {{$sub->id == $products->subcategory_id ? 'selected' : ''}}>
                                                            {{$sub->subcategory_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 1st Row // --------->
                                    <!--------- // 2nd Row // --------->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select SubSubCategory
                                                        </option>
                                                        @foreach($subsubcategory as $subsub)
                                                        <option value="{{$subsub->id}}"
                                                            {{$subsub->id == $products->subsubcategory_id ? 'selected' : ''}}>
                                                            {{$subsub->subsubcategory_name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_id')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name En<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control"
                                                        required="" value="{{$products->product_name_en}}">
                                                    @error('product_name_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name hin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_hin" class="form-control"
                                                        required="" value="{{$products->product_name_hin}}">
                                                    @error('product_name_hin')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 2nd Row // --------->
                                    <!--------- // 3rd Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control"
                                                        required="" value="{{$products->product_code}}">
                                                    @error('product_code')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" class="form-control"
                                                        required="" value="{{$products->product_qty}}">
                                                    @error('product_qty')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 3rd Row // --------->
                                    <!--------- // 4th Row // --------->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags en<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en" class="form-control"
                                                        value="{{$products->product_tags_en}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_tags_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags hin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_hin" class="form-control"
                                                        value="{{$products->product_tags_hin}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_tags_hin')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size En<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en" class="form-control"
                                                        value="{{$products->product_size_en}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_size_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 4th Row // --------->
                                    <!--------- // 5th Row // --------->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size Hin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_hin" class="form-control"
                                                        value="{{$products->product_size_hin}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_size_hin')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color En<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_en" class="form-control"
                                                        value="{{$products->product_color_en}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_color_en')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color Hin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_hin" class="form-control"
                                                        value="{{$products->product_color_hin}}" data-role="tagsinput"
                                                        required="">
                                                    @error('product_color_hin')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 5th Row // --------->
                                    <!--------- //  6th Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control"
                                                        required="" value="{{$products->selling_price}}">
                                                    @error('selling_price')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Dicounted Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control"
                                                        required="" value="{{$products->discount_price}}">
                                                    @error('discount_price')
                                                    <span class="text-danger">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 6th Row // --------->
                                    <!--------- //  7th Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control"
                                                        required placeholder="Textarea text"
                                                        required="">{!! $products->short_descp_en !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_hin" id="textarea" class="form-control"
                                                        required placeholder="Textarea text"
                                                        required="">{!! $products->short_descp_hin !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 7th Row // --------->
                                    <!--------- //  8th Row // --------->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80"
                                                        required="">
                                                    {!! $products->long_descp_en !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_descp_hin" rows="10" cols="80"
                                                        required="">
                                                    {!! $products->long_descp_hin !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--------- // End of 8th Row // --------->
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
                                                    {{$products->hot_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                    {{$products->featured == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1"
                                                    {{$products->special_offer == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1"
                                                    {{$products->special_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                            </div>
                

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

    <!-- /////////// Start Thambnail Image Update Area ////////// -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thambnail Image </h4>
                    </div>
                    <div class="row row-sm">
                        <div class="col d-flex justify-content-center ">
                            <div class="card">
                                <img src="{{asset($products->product_thambnail)}}" class="card-img-top"
                                    style="height:504px;width:280px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  ">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image </h4>
                    </div>
                    <div class="row row-sm">
                        <div class="col d-flex justify-content-center flex-wrap ">
                            @foreach($multiImgs as $img)
                            <div class="card">
                                <img src="{{asset($img->photo_name)}}" class="card-img-top"
                                    style="height:504px;width:280px;">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /////////// End Thambnail Image Update Area ////////// -->
    <!-- /.content -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="subsubcategory_id"]').html('');
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

    $('select[name="subcategory_id"]').on('change', function() {
        var subcategory_id = $(this).val();
        if (subcategory_id) {
            $.ajax({
                url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subsubcategory_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subsubcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subsubcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });
});
</script>

<script type="text/javascript">
function mainThamUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThmb').attr('src', e.target.result).width(280).height(504);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
$(document).ready(function() {
    $('#multiImg').on('change', function() { //on file input change
        if (window.File && window.FileReader && window.FileList && window
            .Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) { //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e
                                    .target.result).width(80)
                                .height(80); //create image element 
                            $('#preview_img').append(
                                img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>

@endsection