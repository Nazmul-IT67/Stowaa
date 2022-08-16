@extends('Dashboard.master')
@section('content')
    <style>
        .form-group>label {
            font-size: 1.1rem;
        }

        .form-group>select {
            background-color: #1B282E;
        }

        .form-group>input {
            background-color: #1B282E;
        }
    </style>
    <div class="content-wrapper">
        <div class="fix-top" style="color:aliceblue; margin-top:-75px">
            <a href="{{ route('Dashboard') }}" style="color:aliceblue"><i
                    class="zmdi zmdi-view-dashboard mr-2"></i>Dashboard/</a>
            <span class="text-capitalize">{{ $last }}</span>
        </div>
        <div class="container">
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="card-body col-8 m-auto" style="border:1px solid #9DBEF2">
                <div class="card-title text-center">Product From</div>
                @if (session()->has('message'))
                    <script>
                        swal('Great Job!', '{!! Session::get('message') !!}', 'success', {
                            button: 'OK',
                        })
                    </script>
                @endif
                <hr>
                <form action="{{ route('SubCategoryPost') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Category Name</option>
                            @foreach ($categorys as $value)
                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="subcategory_name">Select SubCategory</label>
                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                            <option value="">SubCategory Name</option>
                            @foreach ($subcategorys as $value)
                                <option value="{{ $value->id }}">{{ $value->subcategory_name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="subcategory_id">SubCategory Name</label>
                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id"
                            id="subcategory_id"></select>
                        @error('subcategory_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="brand_name">Product Brand</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="">Brand Name</option>
                            @foreach ($brand as $value)
                                <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="color_name">Product Color</label>
                        <select class="form-control" name="color_id" id="color_id">
                            <option value="">Color Name</option>
                            @foreach ($color as $value)
                                <option value="{{ $value->id }}">{{ $value->color_name }}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="size_name">Product Size</label>
                        <select class="form-control" name="size_id" id="size_id">
                            <option value="">Size Name</option>
                            @foreach ($size as $value)
                                <option value="{{ $value->id }}">{{ $value->size_name }}</option>
                            @endforeach
                        </select>
                        @error('size_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="slug">Product Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                            id="slug" value="{{ $subcategory->slug ?? old('slug') }}">
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--Javascript-->

                    <div class="input-group form-group control-group after-add-more">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                        <div class="input-group-btn">
                            <button class="btn btn-success add-more px-4 py-2" type="button"><i
                                    class="glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light px-5 mt-3">Submit</button>
                    </div>
                </form>

                <div class="copy hide">
                    <div class="control-group form-group input-group" style="margin-top:10px">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                        <div class="input-group-btn">
                            <button class="btn btn-dark remove p-2" type="button"><i
                                    class="glyphicon  glyphicon-remove"></i>Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection
