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
            <div class="card-body col-8 m-auto rounded" style="border:1px solid #505255">
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

                    <div class="row mt-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="thumbnail">Product Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                            </div>
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload" style="max-height: 250px;">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="image">Product Images</label>
                                <input multiple type="file" id="image" name="image[]" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                                    placeholder="Product Price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.8/css/bootstrap.min.css">
                    <table class="table table-hover table-bordered" id="tb">
                        <tr class="tr-header text-center">
                            <th class="m-3">Product Color</th>
                            <th class="m-3">Product Size</th>
                            <th class="m-3">Quantity</th>
                            <th class="m-3">Product Price</th>
                            <th class="m-3"><button type="button" id="addMore" class="btn btn-info">Add More</button>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="color_id[]" id="color_id">
                                    <option value="">-- Color --</option>
                                    @foreach ($colors as $value)
                                        <option value="{{ $value->id }}">{{ $value->color_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="size_id[]" id="size_id">
                                    <option value="">-- Size --</option>
                                    @foreach ($sizes as $value)
                                        <option value="{{ $value->id }}">{{ $value->size_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="quantity[]" class="form-control"></td>
                            <td><input type="text" name="product_price[]" class="form-control"></td>
                            <td>
                                <button type="button" class="remove btn btn-danger">Remove</button>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('#addMore').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if (trIndex > 1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
            });
        });
    </script>

    {{-- Image Preview --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#thumbnail').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
