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

            @if(session()->has('message'))
                <script>
                    swal('Great Job!','{!! Session::get('message') !!}','success',{
                        button:'OK',
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($subcat as $key=> $items)
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $subcat->firstItem() +$key}}</td>
                            <td>{{ $items->category->category_name }}</td>
                            <td>{{ $items->subcategory_name }}</td>
                            <td>{{ $items->created_at !=null ? $items->created_at->diffForHumans():'N/A' }}</td>
                            <td>
                                @if ($items->status==1)
                                    <a href="{{ route('ChangeStatus',$items->id) }}" class="btn btn-outline-success">Active</a>
                                @else
                                    <a href="{{ route('ChangeStatus',$items->id) }}" class="btn btn-outline-danger">Deactive</a>
                                @endif
                            </td>
                            <td>
                                @if ($items->status==1)
                                    <a href="{{ route('SubCategoryEdit',$items->id) }}" class="btn btn-outline-secondary">Edit</a>
                                    <a href="{{ route('SubCategoryDelete',$items->id) }}" class="btn btn-outline-danger">Delete</a>
                                @else
                                    <a class="btn btn-outline-danger">Not Allow</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
