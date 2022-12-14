@extends('Dashboard.master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="content-wrapper">
        <div class="fix-top mb-5">
            <a href="{{ route('Dashboard') }}"><i class="zmdi zmdi-view-dashboard mr-2"></i>Dashboard/</a>
            <span class="text-capitalize">{{ $last }}</span>
        </div>
        <div class="card-body rounded" style="border:1px solid #9DBEF2">
            <h5 class="card-title text-center">SubCategory List({{ $count }})</h5>
            <div class="text-right">
                <a href="{{ route('SubCategory') }}"><i class="fa fa-plus"></i> Add</a>
            </div>

            @if (session()->has('message'))
                <script>
                    swal('Great Job!', '{!! Session::get('message') !!}', 'success', {
                        button: 'OK',
                    })
                </script>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Created AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($subtrash as $key => $items)
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $subtrash->firstItem() + $key }}</td>
                                <td>{{ $items->category->category_name }}</td>
                                <td>{{ $items->subcategory_name }}</td>
                                <td>{{ $items->created_at != null ? $items->created_at->diffForHumans() : 'N/A' }}</td>

                                <td>
                                    <a href="{{ route('SubCategoryReset', $items->id) }}"
                                        class="btn btn-outline-secondary">Reset</a>
                                    <a href="{{ route('SubCategoryPDelete', $items->id) }}"
                                        class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
