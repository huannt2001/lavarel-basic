@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Create HomeAbout</div>
                                <div class="card-body">
                                    <form action="{{ route('store.about') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Short desciption</label>
                                            <textarea name="short_description" class="form-control" cols="100%" rows="8">{{old('short_description')}}</textarea>
                                            @error('short_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Long desciption</label>
                                            <textarea name="long_description" class="form-control" cols="100%" rows="8">{{old('long_description')}}</textarea>
                                            @error('long_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create HomeAbout</button>
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
