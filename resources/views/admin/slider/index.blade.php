@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <a href="{{route('add.slider')}}" class="ms-3">
                            <button class="btn btn-info">Add Slider</button>
                        </a>
                        <div class="col-md-12">
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="card-header">All Slider</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col" width="20%">Slider Title</th>
                                                <th scope="col" width="40%">Slider Description</th>
                                                <th scope="col">Slider Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if (isset($sliders) && count($sliders) > 0)
                                                @foreach ($sliders as $slider)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}
                                                        </th>
                                                        <td>{{ $slider->title }}</td>
                                                        <td>{{ $slider->description }}</td>
                                                        <td>
                                                            <img src="{{ asset($slider->image) }}" alt=""
                                                                style="width: 50px;">
                                                        </td>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/slider/edit/' . $slider->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ url('slider/delete/' . $slider->id) }}"
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
                                    {{-- @if (isset($sliders) && count($sliders) > 0)
                                        {{ $sliders->links() }}
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div

@endsection
