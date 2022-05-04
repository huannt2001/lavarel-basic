@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">
                        <a href="{{route('add.about')}}" class="ms-3">
                            <button class="btn btn-info">Add About</button>
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
                                <div class="card-header">All About</div>

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col" width="15%">Home Title</th>
                                                <th scope="col" width="20%">Short Description</th>
                                                <th scope="col" width="40%">Long Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if (isset($homeabout) && count($homeabout) > 0)
                                                @foreach ($homeabout as $about)
                                                    <tr>
                                                        <th scope="row">{{ $i++ }}
                                                        </th>
                                                        <td>{{ $about->title }}</td>
                                                        <td>{{ $about->short_description }}</td>>
                                                        <td>{{ $about->long_description }}</td>>
                                                        {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td> --}}

                                                        <td>
                                                            <a href="{{ url('/about/edit/' . $about->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ url('about/delete/' . $about->id) }}"
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
                                    {{-- @if (isset($homeabout) && count($homeabout) > 0)
                                        {{ $homeabout->links() }}
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
