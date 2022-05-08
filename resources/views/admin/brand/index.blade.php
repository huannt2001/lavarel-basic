@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">All Brand</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Brand Name</th>
                                                <th scope="col">Brand Image</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($brands) && count($brands) > 0)
                                                @foreach ($brands as $brand)
                                                    <tr>
                                                        <th scope="row">{{ $brands->firstItem() + $loop->index }}
                                                        </th>
                                                        <td>{{ $brand->brand_name }}</td>
                                                        <td><img src="{{ asset($brand->brand_image) }}" alt=""
                                                                style="width: 50px;"></td>
                                                        <td>
                                                            @if ($brand->created_at == null)
                                                                <span class="text-danger">No Data Set</span>
                                                            @else
                                                                {{ $brand->created_at->diffForHumans() }}
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/brand/edit/' . $brand->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ url('brand/delete/' . $brand->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure delete?')">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="5">No data</td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    @if (isset($brands) && count($brands) > 0)
                                        {{ $brands->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Brand</div>
                                <div class="card-body">
                                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                            <input type="text" name="brand_name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('brand_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                            <input type="file" name="brand_image" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Brand</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
</div @endsection
