@extends('Dashboard.master')
@section('content')

    <div class="content-wrapper">
        <div class="fix-top">
            <a href="{{ route('Dashboard') }}"><i
                    class="zmdi zmdi-view-dashboard mr-2"></i>Dashboard/</a>
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
                        <input type="text" name="product_title" class="form-control @error('product_title') is-invalid @enderror" id="product_title" value="{{ old('product_title') }}" placeholder="Product Title">
                        @error('product_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Product Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" placeholder="Product Slug">
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="summery">Product Summery</label>
                        <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" id="summery" placeholder="Summery Hare" value="{{ old('summery') }}"></textarea>
                        @error('summery')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description Hare" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" placeholder="Product Price">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Product Image</label>
                        <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Product Gallery</label>
                        <input multiple type="file" id="product_image" name="image[]" class="form-control">
                    </div>

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
@endsection

