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
                <div class="card-title text-center">Add Size</div>
                @if(session()->has('message'))
                    <script>
                        swal('Great Job!','{!! Session::get('message') !!}','success',{
                            button:'OK',
                        })
                    </script>
                @endif
                <hr>
                <form action="{{ route('SizePost') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="size_name">Size Name</label>
                        <input type="text" name="size_name" class="form-control @error('size_name') is-invalid @enderror" id="size_name" placeholder="Size Name:'Xl, XXL,'" value="{{ $size->size_name ?? old('size_name') }}">
                        @error('size_name')
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
