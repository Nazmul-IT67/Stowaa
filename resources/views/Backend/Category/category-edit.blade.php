@extends('Dashboard.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
            <div class="card-body col-6 m-auto" style="border:1px solid #9DBEF2">
                <div class="card-title text-center">Edit Category</div>
                @if(session()->has('message'))
                    <script>
                        swal('Great Job!','{!! Session::get('message') !!}','success',{
                            button:'OK',
                        })
                    </script>
                @endif
                <hr>
                <form action="{{ route('CategoryUpdate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Enter Your Category Name" value="{{ $category->category_name ?? old('category_name') }}">
                        @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-light px-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
