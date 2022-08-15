@extends('Dashboard.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="content-wrapper">
        <div class="fix-top">
            <a href="{{ route('Dashboard') }}"><i class="zmdi zmdi-view-dashboard mr-2"></i>Dashboard/</a>
            <span class="text-capitalize">{{ $last }}</span>
        </div>
        <div class="container-fluid mt-5">
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="card-body col-6 m-auto" style="border:1px solid #9DBEF2">
                <div class="card-title text-center">Add SubCategory</div>
                @if(session()->has('message'))
                    <script>
                        swal('Great Job!','{!! Session::get('message') !!}','success',{
                            button:'OK',
                        })
                    </script>
                @endif
                <hr>
                <form action="{{ route('SubCategoryPost') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="subcategory_name">Select Category</label>
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

                    <div class="form-group">
                        <label for="subcategory_name">SubCategory Name</label>
                        <input type="text" name="subcategory_name" class="form-control @error('category_name') is-invalid @enderror" id="subcategory_name" placeholder="Enter Your Category Name" value="{{ $subcategory->category_name ?? old('subcategory_name') }}">
                        @error('subcategory_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $subcategory->slug ?? old('slug') }}">
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('slug')
    <script>
        $('#subcategory_name').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
    </script>
@endsection
