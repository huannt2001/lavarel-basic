@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Update Slider</div>
                                <div class="card-body">
                                    <form action="{{ url('slider/edit/' . $slider->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_image" value={{ $slider->image }}>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->title}}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Slider desciption</label>
                                            <textarea name="description" class="form-control" cols="100%" rows="8">{{$slider->description}}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Slider image</label>
                                            <input type="file" name="image" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ asset($slider->image) }}" alt="" style="width: 400px;">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Slider</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div

@endsection
