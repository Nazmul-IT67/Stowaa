@extends('Dashboard.master')
@section('content')
    <div class="content-wrapper">
        <div class="fix-top">
            <a href="{{ route('Dashboard') }}"><i class="zmdi zmdi-view-dashboard mr-2"></i>Dashboard/</a>
            <span class="text-capitalize">{{ $last }}</span>
        </div>
        <div class="container">
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="card-body col-7 m-auto" style="border:1px solid #9DBEF2">
                <div class="card-title text-center">Product From</div>
                <hr>
                <form action="{{ route('ProductPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">-- Select Cateory --</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subcategory_id">SubCategory Name</label>
                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id"
                            id="subcategory_id"></select>
                        @error('subcategory_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product_title">Product Title</label>
                        <input type="text" name="product_title"
                            class="form-control @error('product_title') is-invalid @enderror" id="product_title"
                            value="{{ old('product_title') }}" placeholder="Product Title">
                        @error('product_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Product Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                            id="slug" value="{{ old('slug') }}" placeholder="Product Slug">
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summery">Product Summery</label>
                        <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" id="summery"
                            placeholder="Product Summery" value="{{ old('summery') }}"></textarea>
                        @error('summery')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                            placeholder="Product Description" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                            placeholder="Product Price" value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row" id="dynamic_field">
                        <div class="col-6 p-2">
                            <label for="color">Product Color</label>
                            <input type="text" id="color" name="color[]" placeholder="Product Color" class="form-control name_list" />
                        </div>
                        <div class="col-6 p-2">
                            <label for="size">Product Size</label>
                            <input type="text" id="size" name="size[]" placeholder="Product Size" class="form-control name_list" />
                        </div>
                        <div class="col-6 p-2">
                            <label for="quantity">Product Quantity</label>
                            <input type="text" id="quantity" name="quantity[]" placeholder="Product Quantity" class="form-control name_list" />
                        </div>
                        <div class="col-6 p-2">
                            <label for="product_price">Product price</label>
                            <input type="text" id="product_price" name="product_price[]" placeholder="Product price" class="form-control name_list" />
                        </div>
                        <div class="col-6 p-2">
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="thumbnail">Product Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image">Product Images</label>
                                <input multiple type="file" id="image" name="image[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('slug')
    <script>
        $('#product_title').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
        });

        // ----Select Sub Category----//

        $('#category_id').change(function() {
            let category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('sub-cat') }}/" + category_id,
                    success: function(e) {
                        if (e) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append('<option value>Select Once</option>');
                            $.each(e, function(key, value) {
                                $('#subcategory_id').append('<option value="' + value.id +
                                    '">' + value.subcategory_name + '</option>');
                            })
                        } else {
                            $('#subcategory_id').empty();
                        }
                    }
                })
            } else {
                $('#subcategory_id').empty();
            }
        });
    </script>

    {{-- //Add More Input// --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td class="col-3 pb-1"><label for="color">product Color</label><input type="text" name="color[]" placeholder="Product Color" class="form-control name_list" /></td><td class="col-3 pb-1"><label for="size">Product Size</label><input type="text" name="size[]" placeholder="Product Size" class="form-control name_list" /></td><td class="col-2 pb-1"><label for="quantity">Quantity</label><input type="text" name="quantity[]" placeholder="Product Quantity" class="form-control name_list" /></td><td class="col-2 pb-1"><label for="product_price">Price</label><input type="text" name="product_price[]" placeholder="Product Price" class="form-control name_list" /></td><td class="col-2 pb-1"><label for="remove">Action</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    url:"name.php",
                    method:"POST",
                    data:$('#add_name').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });
        });
    </script>
@endsection
