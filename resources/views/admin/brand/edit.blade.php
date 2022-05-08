@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Edit Brand</div>
                                <div class="card-body">
                                    <form action="{{ url('brand/edit/' . $brand->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_image" value={{ $brand->brand_image }}>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Edit Name</label>
                                            <input type="text" name="brand_name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value={{ $brand->brand_name }}>
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
                                        <div class="mb-3">
                                            <img src="{{ asset($brand->brand_image) }}" alt="" style="width: 400px;">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit Brand</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
